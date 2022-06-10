<?php

use App\Models\Producto;

/** @var Producto $producto */

?>


@extends('back.layout.backmain')


@section('title')
{{$producto->nombre}}
@endsection


@section('main')

<div class="row mb-5">
    <div class="col">
        <a href="{{route('productos.index')}}">Volver al listado de productos</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <h1 class="titulo">Detalles del producto</h1>
    </div>
</div>

<div class="row">
    
      
      
      <div class="col-md-4">
       <div class="card">
           @if($producto->imagen)
            <img src="{{url('img/productos/'. $producto->imagen)}}" alt="{{$producto->nombre}}" class="img-fluid">
           @else
            <img src="{{url('img/sinimagen.jpg')}}" alt="{{$producto->nombre}}" class="img-fluid">
           @endif
       </div>
    </div>
    
    
    
    <div class="col-md-8">
        <div class="card px-3 py-3 data-producto">
           <div class="row">
               <div class="col">
                    <h2 class="h4 font-weight-bold text-white border-bottom mb-3 pb-3">{{$producto->nombre}}</h2>
               </div>
           </div>
           <div class="row mt-2">
               <div class="col-md-4">
                    <h3  class="h5 text-white">Precio</h3>
                    <p>${{$producto->precio}}</p>
               </div>

               <div class="col-md-4">
                    <h3 class="h5 text-white">Stock</h3>
                    @if($producto->estado == 1)
                    <p>{{$producto->stock}}</p>
                    @else
                    <p>Sin Stock</p>
                    @endif
               </div>
               
               <div class="col-md-4">
                    <h3 class="h5 text-white">Estado</h3>
                    @if($producto->estado == 1)
                    <p>Disponible</p>
                    @else
                    <p>No disponible</p>
                    @endif
               </div>
           </div>
           <div class="row mt-2">
               <div class="col-md-4">
                    <h3  class="h5 text-white">Consola</h3>
                    @if($producto->id_consola)
                    <p>{{$producto->consola->nombre_consola}}</p>
                    @else
                    <p class="text-warning">Sin asignar</p>
                    @endif
               </div>
               <div class="col-md-4">
                    <h3  class="h5 text-white">Marca</h3>
                    @if($producto->id_marca)
                    <p>{{$producto->marca->nombre_marca}}</p>
                    @else
                    <p class="text-warning">Sin asignar</p>
                    @endif
               </div>
               <div class="col-md-4">
                    <h3  class="h5 text-white">Categoría</h3>
                    @if($producto->id_categoria)
                    <p>{{$producto->categoria->nombre_categoria}}</p>
                    @else
                    <p class="text-warning">Sin asignar</p>
                    @endif
               </div>
           </div>
           @if(count($producto->generos) != 0)
           <div class="row mt-2">
               <div class="col">
                   <h3 class="h5 text-white">Géneros</h3>
                   <div class="my-1 d-inline-block">
                       @foreach($producto->generos as $genero)
                           <p class="ver-genero">{{$genero->nombre_genero}}</p>
                       @endforeach
                   </div>
               </div>
           </div>
           @endif
           @if($producto->descripcion)
           <div class="row mt-3">
               <div class="col">
                    <h3  class="h5 text-white">Descripción</h3>
                    <p>{{$producto->descripcion}}</p>
               </div>
           </div>
           @endif
           <a href="{{route('productos.form-editar', ['id' =>$producto->id_producto])}}" data-toggle="tooltip" data-placement="top" title="Editar detalles del producto" class="text-white btn btn-primary rounded-0 mt-5"><i class="fas fa-edit"></i> Editar producto</a>
        </div>
    </div>
</div>
@endsection