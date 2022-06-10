<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Usuario;
use App\Models\Producto;
use App\Cart\Carrito;
use App\Cart\Carritoitem;



use Session;

class CarritoController extends Controller
{
    
    public function addItem(Request $request, $id)
    {
        // PRODUCTO
        $producto = Producto::findOrFail($id);
        
        // SI EXISTE UN CARRITO LO BUSCO, SINO LO CREO
        $carrito = Session::has('carrito') ? $request->session()->get('carrito') : new Carrito;

        // CREO EL CARRITOITEM
        $ci = new Carritoitem($producto);
        
        // AGREGO EL CARRITOITEM EN EL CARRITO
        $carrito->addItem($ci);
        
        // GUARDO EL CARRITO EN LA SESIÓN
        $request->Session()->put('carrito', $carrito);
        
        return back();
    }
    
    public function removeAll(Request $request)
    {
       // BUSCO CARRITO
        if(Session::has('carrito')){
            $carrito = $request->session()->get('carrito');
        }else{
            return true;
        }
        
        // BORRAR TODOS LOS ITEMS
        $carrito->removeAll();  
        
        // GUARDO EL CARRITO EN LA SESIÓN
        $request->Session()->put('carrito', $carrito);
        
        return back()
            ->with('success-message', 'Los productos del carrito han sido borrados exitósamente');
    }
    
    public function removeItem(Request $request, $id)
    {
        // BUSCO CARRITO
        if(Session::has('carrito')){
            $carrito = $request->session()->get('carrito');
        }else{
            return true;
        }
        
        // BORRO EL ELEMENTO
        $carrito->removeItem($id);
        
        // GUARDO EL CARRITO EN LA SESIÓN
        $request->Session()->put('carrito', $carrito);
        
        return back(); 
    }
    
    public function checkout(Request $request){
        // BUSCO CARRITO
        if(Session::has('carrito')){
            $carrito = $request->session()->get('carrito');
        }else{
            return true;
        }
        
        // CREO LA VARIABLE DEL PEDIDO
        $pedido = [
            'id_usuario'    => Auth::user()->id_usuario,
            'fecha_pedido'  => date("Y-m-d H:i:s"),
            'precio_total'  => $carrito->getTotal(),
        ];
        
        // VARIABLE DE DETALLES DEL PEDIDO
        $pedido_detalles = [];
        foreach($carrito->getItems() as $item){
            $pedido_detalles[] = [
                "id_producto" => $item->getProducto()->id_producto,
                "nombre_producto" => $item->getProducto()->nombre,
                "precio_producto" => $item->getProducto()->precio,
                "cantidad" => $item->getCantidad(),
            ];
        }
        
        // DATOS DEL USUARIO
        $usuario = Usuario::findOrFail(Auth::user()->id_usuario);
        
        // LOS GUARDO EN SESIONES PARA USO POSTERIOR
        $request->Session()->put('pedido', $pedido);
        $request->Session()->put('pedido_detalles', $pedido_detalles);
         $request->Session()->put('carrito', $carrito);
        
        // VUELVO A HOME
        
        
        return view('front/checkout/checkout', compact('pedido', 'pedido_detalles', 'usuario'));
    
    }
    

    
    
}
