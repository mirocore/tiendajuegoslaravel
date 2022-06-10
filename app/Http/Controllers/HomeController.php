<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Pedido;
use App\Models\Marca;
use App\Models\Consola;
use App\Models\Categoria;
use App\Models\Genero;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::with(['marca', 'consola', 'categoria'])
            ->where([
                    ["stock", ">", 0],
                    ['estado', '=', '1'],
                    ])
            ->limit(10)->orderBy('id_producto', 'desc')->get(); 
        
        $consolas = Consola::all();
        $categorias = Categoria::all();
        $marcas = Marca::all();
        $generos = Genero::all();
        
        
        
        return view('front/inicio', compact('productos', 'marcas', 'consolas', 'categorias', 'generos'));
    }
}
