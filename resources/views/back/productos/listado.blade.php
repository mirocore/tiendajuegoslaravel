<?php

use App\Models\Producto;

/** @var Producto[]|\Illuminate\Database\Eloquent\Collection $productos */

?>

@extends('back.layout.backmain')


@section('title')
    Listado de Productos
@endsection


@section('main')
   
   <div class="row">
      @if(Session::has('success'))
       <div class="col">
           <div class="msj msj-ok"><p>{{Session::get('success')}}</p></div>
       </div>
      @endif
   </div>
   
   
    <div class="row">
        <div class="col">
            <h1 class="titulo">Listado de Productos</h1>
        </div>
    </div>
    
    <div class="row mb-4">
        <div class="col">
            <a href="{{route('productos.form-nuevo')}}" class="rounded-0 bg-success text-white px-3 py-3">Añadir Producto</a>
        </div>
    </div>
    
<div class="row">
    <div class="col">
        
    <div class="card">
        <table class="table tablita">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Consola</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Categoria</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td data-titulo="Nombre">{{$producto->nombre}}</td>
                        <td data-titulo="Consola">
                        @if($producto->id_consola)
                        {{$producto->consola->nombre_consola}}
                        @else
                        <p class="text-warning">Sin asignar</p>
                        @endif
                        </td>
                        <td data-titulo="Precio">${{$producto->precio}}</td>
                        @if($producto->stock > 0)
                            <td><p class="bg-success text-white mb-0 py-2 px-2 d-inline">En Stock</p></td>
                        @else
                            <td class=""><p class="bg-danger text-white mb-0 py-2 px-2 d-inline">Sin Stock</p></td>
                        @endif
                        <td data-titulo="Categoría">{{$producto->categoria->nombre_categoria}}</td>
                        
                        
                        
                        <td class="acciones">
                            <!-- =========================
                                    VER DETALLES
                            ========================= -->
                            <a href="{{route('productos.ver', ['id' =>$producto->id_producto])}}" data-toggle="tooltip" data-placement="top" title="Ver detalles del producto"><i class="fas fa-search"></i></a>
                            <!-- =========================
                                    ELIMINAR
                            ========================= -->
                            <form action="{{route('productos.eliminar', ['id' => $producto->id_producto])}}" class="d-inline m-0 p-0" method="post">
                                @csrf
                                @method('DELETE')
                                <button
                                    onclick="return confirm('¿Está seguro que desea borrar el producto {{$producto->nombre}}?');"
                                    class="sinBtn"
                                    data-toggle="tooltip"    
                                    data-placement="top"    
                                    title="Eliminar producto"    
                                ><i class="fas fa-trash-alt"></i></button>
                            </form>
                            <!-- =========================
                                    EDITAR
                            ========================= -->
                            <a href="{{route('productos.form-editar', ['id' =>$producto->id_producto])}}" data-toggle="tooltip" data-placement="top" title="Editar detalles del producto"><i class="fas fa-edit"></i></a>
                        </td>
                        
                        
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="myPagination ml-auto mr-2 rounded-0">    
            {{$productos->links()}}
        </div>
    </div>
    
    </div>
</div> 

  
<script>
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })    
</script>    
      
          
@endsection