<?php

namespace App\Http\Controllers;


use App\Models\Producto;
use App\Models\Consola;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Genero;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function index(){
        $productos = Producto::with("categoria", "consola", "generos", "marca")
            ->where([
                    ["stock", ">", 0],
                    ['estado', '=', '1'],
                    ])
            ->orderBy('id_producto', 'desc')
            ->paginate(9);
        
        $consolas = Consola::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $generos = Genero::all();
        
        
        
        return view('front/tienda/listado', compact('productos', 'marcas', 'consolas', 'categorias', 'generos'));
    }
    
    public function ver($id){
        $producto = Producto::with('consola', 'categoria', 'marca', 'generos')
            ->findOrFail($id);
        
        $consolas = Consola::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $generos = Genero::all();
        
        return view('front/tienda/ver', compact('producto', 'marcas', 'consolas', 'categorias', 'generos'));
    }
    
    public function filtrar($elemento, $id)
    {
        switch($elemento){
            case "consola":
               $productos = Producto::with("categoria", "consola", "generos", "marca")
                   ->where([
                    ["id_consola", "=", $id],
                    ['estado', '=', '1'],
                    ])   
                   ->orderBy('id_producto', 'desc')
                   ->paginate(9);
                break;
            case "categoria":
                $productos = Producto::with("categoria", "consola", "generos", "marca")
                    ->orderBy('id_producto', 'desc')
                    ->where([
                    ["id_categoria", "=", $id],
                    ['estado', '=', '1'],
                    ])
                    ->paginate(9);
                break;
            case "generos":
                $productos = Producto::with("categoria", "consola", "generos", "marca")
                ->leftJoin('productos_tienen_generos', 'productos.id_producto', '=', 'productos_tienen_generos.id_producto')
                ->where([
                    ["id_genero", "=", $id],
                    ['estado', '=', '1'],
                    ])    
                ->orderBy('productos.id_producto', 'desc')
                ->paginate(9);
                break;
        }
        
        $consolas = Consola::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $generos = Genero::all();
        return view('front/tienda/filtro', compact('productos', 'id', 'elemento', 'marcas', 'consolas', 'categorias', 'generos'));
    }
    
    public function buscar(Request $request)
    {
        $item = $request->input('buscar');
        
        $productos = Producto::with('consola', 'generos', 'categoria', 'marca')
            ->where('nombre', 'like', '%' . $item . '%')
            ->orWhere('descripcion', 'like', '%' . $item . '%')
            ->paginate(9);
        
        $consolas = Consola::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $generos = Genero::all();
        
        return view('front/tienda/busqueda', compact('productos', 'marcas', 'consolas', 'categorias', 'generos', 'item'));
    }
    
}
