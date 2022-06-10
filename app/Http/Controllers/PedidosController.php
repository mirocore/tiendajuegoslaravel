<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Cart\Carrito;
use App\Models\Producto;
use App\Models\Usuario;
use App\Models\Pedido_detalle;
use Illuminate\Http\Request;

use Session;

class PedidosController extends Controller
{
    public function index(){
        $pedidos = Pedido::orderBy('id_pedido', 'desc')
            ->paginate(10);
        
        $usuarios = Usuario::all();
        
        foreach($pedidos as $pedido){
            //USUARIOS
            foreach($usuarios as $usuario){
                if($usuario->id_usuario == $pedido->id_usuario){
                    $pedido->usuario = $usuario->apellido . " " . $usuario->nombre;
                }
            }
        }
        
        return view('back/pedidos/listado', compact('pedidos'));
    }
    
    public function ver($id)
    {
        $pedido = Pedido::findOrFail($id);
        $usuario = Usuario::where('id_usuario', '=' , $pedido->id_usuario)->get();
        $pedido->usuario = $usuario[0]->apellido . " " . $usuario[0]->nombre;
        $productos = Pedido_detalle::where('id_pedido', '=', $pedido->id_pedido)->get();
        
        
        return view('back/pedidos/ver', compact('pedido', 'productos'));
    }
    
    public function confirmar(Request $request)
    {
        if(Session::has('pedido') && Session::has('pedido_detalles')){
            $pedido = $request->session()->get('pedido');
            $pedido_detalles = $request->session()->get('pedido_detalles');
        }else{
            return back()
            ->with('error-message', 'Ha ocurrido un error con la sesión. Por favor vuelva a intentarlo');
        }
        
        $pedido['precio_total'] = floatval($pedido['precio_total']);
        
        // VERIFICO QUE HAYA STOCK
        foreach($pedido_detalles as $detalle){
            // BUSCO EN LA BASE
            $producto = Producto::findOrFail($detalle['id_producto']);
            if($producto->stock < $detalle['cantidad']){
                return back()
                ->with('error-message', 'La cantidad solicitada del producto "' . $producto->nombre . '" supera la cantidad de stock que tenemos disponible.');
            }else{
                // HAY STOCK ASÍ QUE MODIFICA LA CANTIDAD DE STOCK DE LA BASE DE DATOS
                $producto->stock = $producto->stock - $detalle['cantidad'];
                $producto->save();
            }
            
        }
        
        // INGRESO EL PEDIDO
        $pedidoNuevo = Pedido::create($pedido);
        
        // INGRESO LOS DETALLES
        foreach($pedido_detalles as $detalle){
            $detalle['id_pedido'] = $pedidoNuevo->id_pedido;
            $detalleNuevo = Pedido_detalle::create($detalle);
        }
        
        // BORRO LAS SESIONES
//        session()->forget('pedido');
//        session()->forget('pedido_detalles');
        
        // VACÍO EL CARRITO
        if(Session::has('carrito')){
            $carrito = $request->session()->get('carrito');
            $carrito->removeAll();
        }
        
        // VUELVO A HOME
        return redirect()->route('Home')
            ->with('success-message', '¡Felicidades! Su compra ha sido realizada con éxito. En la brevedad nos pondremos en contacto con usted. Por favor vuelva pronto y muchas gracias.');
        
    }    
}
