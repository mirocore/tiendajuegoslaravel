<?php

use App\Models\Pedido;

/** @var Pedido $pedido */

?>


@extends('back.layout.backmain')

@section('title')
Ver detalles del pedido
@endsection


@section('main')
   
<div class="row mb-5">
    <div class="col">
        <a href="{{route('pedidos.index')}}">Volver al listado de pedidos</a>
    </div>
</div>   
   
    <div class="row">
        <div class="col">
            <h2 class="titulo">
                Detalles del pedido
            </h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card p-4">
                <div class="row">
                    <div class="col">
                        <h3 class="h4 text-white">Usuario</h3>
                        <p>{{$pedido->usuario}}</p>
                    </div>
                    <div class="col">
                        <h3 class="h4 text-white">Fecha del pedido</h3>
                        <p>{{$pedido->fecha_pedido}}</p>
                    </div>
                    <div class="col">
                        <h3 class="h4 text-white">Importe</h3>
                        <p>${{$pedido->precio_total}}</p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h3 class="text-white h4 border-bottom pb-1 mb-2">Productos:</h3>
                        @foreach($productos as $producto)
                            <div class="p-2">
                                <h4 class="text-white">{{$producto->nombre_producto}}</h4>
                                <ul>
                                    <li class="">Precio: ${{$producto->precio_producto}}</li>
                                    <li class="">Cantidad: {{$producto->cantidad}}</li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection