<?php

use App\Models\Producto;

/** @var Producto $producto */

// IMAGEN DEL PRODUCTO
if($producto->imagen){
    $img_producto = 'productos/' . $producto->imagen;
}else{
    $img_producto = 'sinimagen.jpg';
}

?>


@extends('front.layout.frontmain')

@section('title')
{{$producto->nombre}}
@endsection


@section('main')

<div class="row mt-5">
    <div class="col-sm-6">
        <img src="{{url('img/' . $img_producto)}}" alt="{{$producto->nombre}}" class="img-fluid img-ver">
    </div>
    <div class="col-sm-6 producto-ver">
        <h2 class="d-inline-block mb-1">{{$producto->nombre}}</h2>
        @if($producto->stock > 0)
            <p class="d-inline-block ml-3 text-white bg-success p-2 mb-1">En stock</p>
        @else
            <p class="d-inline-block ml-3 text-white bg-danger p-2 mb-1">Sin stock</p>
        @endif
        <p class="precio">${{$producto->precio}}</p>
    
        <ul class="list-unstyled my-3 py-3 border-top border-bottom">
            <li><span class="font-weight-bold">Categoría:</span> {{$producto->categoria->nombre_categoria}}</li>
            <li><span class="font-weight-bold">Consola:</span> {{$producto->consola->nombre_consola}}</li>
            <li><span class="font-weight-bold">Marca:</span> {{$producto->marca->nombre_marca}}</li>
        </ul>
        
        <p class="pb-3 mb-3 border-bottom"><span class="font-weight-bold">Descripción:</span> {{$producto->descripcion}}</p>
        
        @if(Auth::check())
            @if($producto->stock == 0)
                <button class="btn btn-danger mx-auto rounded-0 mt-2">Sin Stock</button>
            @else
               <a href="{{route('carrito.additem', ['id' => $producto->id_producto])}}" class="add-cart-home btn btn-primary mx-auto rounded-0 mt-2"><i class="fas fa-shopping-cart"></i> Añadir a Carrito</a>
            @endif
        @else
            <div class="p-3 bg-warning"><p class="m-0">Para poder agregar este producto al carrito se necesita estar logueado.</p><a href="{{route('auth.front.index')}}">Click aquí para ingresar</a></div>
        @endif
    </div>
</div>

@endsection