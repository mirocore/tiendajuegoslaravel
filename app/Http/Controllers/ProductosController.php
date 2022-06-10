<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Consola;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Genero;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function index()
    {
        $productos = Producto::with("categoria", "consola")
            ->orderBy('id_producto', 'desc')
            ->paginate(10);
        
        return view('back/productos/listado', compact('productos'));
    }
    
    public function ver($id)
    {
        $producto = Producto::with(['consola','categoria', 'marca', 'generos'])->findOrFail($id);
        
        return view('back/productos/ver', compact('producto'));
    }
    
    public function formNuevo(){
        $categorias= Categoria::all();
        $consolas= Consola::all();
        $marcas= Marca::all();
        $generos= Genero::all();
        return view('back/productos/form-nuevo', compact('categorias', 'consolas', 'marcas', 'generos'));
    }
    
    public function crear(Request $request)
    {
        // DATOS RECIBIDOS
        $datosRecibidos = $request->input();
        $generos = $request->input('id_genero');

        // VALIDACION
        $request->validate(Producto::$rules, Producto::$messages);
        
        // IMAGEN
        if($request->imagen){
            $imagen = $request->imagen;
                // NOMBRE DE LA IMAGEN
                $imagenNombre = time() . "." . $imagen->extension();
                // MUEVO LA IMAGEN
                $imagen->move(public_path('/img/productos'), $imagenNombre);
                // GUARDO LA IMAGEN
                $datosRecibidos['imagen'] = $imagenNombre;
        }else{
            $datosRecibidos['imagen'] = '';
        }
        
        // CREAR NUEVO REGISTRO
        $producto = Producto::create($datosRecibidos);
        
        // REGISTRO DE LOS GÉNEROS
        $producto->generos()->attach($generos);
        
        // VOLVER AL LISTADO
        return redirect()->route('productos.index')
                ->with('success', 'El producto ' . $producto->nombre . ' ha sido ingresado a la base de datos.');
    }
    
    public function eliminar($id){
        // PRODUCTO
        $producto = Producto::findOrFail($id);
        
        // GENERO
        $producto->generos()->detach();
        
        // BORRO
        $producto->delete();
        
        return redirect()->route('productos.index')
            ->with('success', 'El producto ' . $producto->nombre . ' ha sido borrado del sistema');
    }
    
    public function formEditar(Producto $producto){
        $producto = Producto::with(['generos'])->findOrFail($producto->id_producto);
        $categorias= Categoria::all();
        $consolas= Consola::all();
        $marcas= Marca::all();
        $generos= Genero::all();
        return view('back/productos/form-editar', compact('producto', 'categorias', 'consolas', 'marcas', 'generos'));
    }
    
    public function editar(Request $request, Producto $producto)
    {
        // VALIDAR
        $request->validate(Producto::$rules, Producto::$messages);
        
        // DATOS RECIBIDOS
        $nuevaData = $request->input();
        $id_generos = $request->input('id_genero');
        
        // IMAGEN
        if($request->imagen){
            $imagen = $request->imagen;
            $imagenNombre = time() . "." . $imagen->extension();
            $imagen->move(public_path('/img/productos'), $imagenNombre);
            $nuevaData['imagen'] = $imagenNombre;
        }
        
        // GUARDO LOS CAMBIOS
        $producto->update($nuevaData);
        
        // GENEROS
        $producto->generos()->sync($id_generos);
        
        return redirect()-> route('productos.index')
            ->with('success', 'Los datos del producto ' . $producto->nombre . ' han sido actualizados.');
        
    }
}
