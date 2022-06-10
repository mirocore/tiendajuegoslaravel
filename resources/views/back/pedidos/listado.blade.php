<?php

use App\Models\Pedido;

/** @var Pedido[]|\Illuminate\Database\Eloquent\Collection $pedidos */

?>


@extends('back.layout.backmain')


@section('title')
    Listado de pedidos
@endsection


@section('main')
    
<!-- =====================
    MENSAJE DE ERROR
===================== -->
<div class="row">
      @if(Session::has('success'))
       <div class="col">
           <div class="msj msj-ok"><p>{{Session::get('success')}}</p></div>
       </div>
      @endif
</div>
   
<!-- =====================
        PEDIDOS
===================== --> 
   
<div class="row">
    <div class="col">
        <h1 class="titulo">Lista de pedidos</h1>
    </div>
</div> 
   
<div class="row">
    <div class="col">
        <div class="card">
            <table class="table tablita">
                <thead>
                    <tr>
                        <th>Usuario</th>
                        <th>Importe</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->usuario}}</td>
                        <td>${{$pedido->precio_total}}</td>
                        <td>{{$pedido->fecha_pedido}}</td>
                        <td class="acciones">
                           <!-- =========================
                                    VER DETALLES
                            ========================= --> 
                                <a href="{{route('pedidos.ver', ['id' =>$pedido->id_pedido])}}" data-toggle="tooltip" data-placement="top" title="Ver detalles del pedido"><i class="fas fa-search"></i></a> 
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="myPagination ml-auto mr-2 rounded-0">    
            {{$pedidos->links()}}
        </div>
        </div>
    </div>
</div>        
    
@endsection