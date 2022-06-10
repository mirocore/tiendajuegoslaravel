@extends('back.layout.backmain')


@section('title')
{{$usuario->nombre}} {{$usuario->apellido}}
@endsection


@section('main')

<div class="row mb-5">
    <div class="col">
        <a href="{{route('usuarios.index')}}">Volver al listado de usuarios</a>
    </div>
</div>

<div class="row mb-2">
    <div class="col">
        <h2 class="titulo">Datos del usuario</h2>
    </div>
</div>

<div class="row">
    <div class="col-sm-3 text-center">
       <div class="card p-3">
           <figure>
           @if($usuario->avatar)
            <img src="{{url('img/usuarios/' . $usuario->avatar)}}" alt="{{$usuario->apellido}}" class="img-fluid rounded-circle">
            @else
            <img src="{{url('img/sinavatar.jpg')}}" alt="{{$usuario->apellido}}" class="img-fluid rounded-circle">
            @endif
           </figure>
       </div>
    </div>
    <div class="col-sm-9">
       <div class="card p-3  usuario-ver">
            <h3 class="font-weight-bold h5 text-white">Nombre</h3>
            <p class="">{{$usuario->nombre}} {{$usuario->apellido}}</p>
            <h3 class="font-weight-bold h5 text-white">Email</h3>
            <p>{{$usuario->email}}</p>
            <h3 class="font-weight-bold h5 text-white">Miembro desde</h3>
            <p>{{$usuario->created_at}}</p>
            <h3 class="font-weight-bold h5 text-white">Rol de miembro </h3>
            @if($usuario->id_rol == 1)
                <p class="">Administrador</p>
            @else
                <p class="">Usuario</p>
            @endif
                       
            <a href="{{route('usuarios.form-editar', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Editar detalles del usuario" class="text-white btn btn-primary rounded-0 mt-5"><i class="fas fa-edit"></i> Editar datos del usuario</a>
       </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col">
        <h2 class="titulo">Compras realizadas</h2>
    </div>
</div>

@if(count($pedidos) == 0)
<div class="row">
    <div class="col">
        <div class="card p-4">
            <p>El usuario no ha realizado ninguna compra hasta la fecha.</p>
        </div>
    </div>
</div>
@else
<div class="row">
    <div class="col">
        <div class="card p-4">
            <ul class="list-unstyled">
                @foreach($pedidos as $pedido)
                <li class="border-bottom p-3">
                    <h3 class="text-white h4">Fecha de la compra</h3>
                    <p>{{$pedido->fecha_pedido}}</p>
                    <h3 class="text-white h4">Productos adquiridos</h3>
                    <ul>
                        @foreach($pedido->detalles as $detalle)
                            <li>{{$detalle->cantidad}} x {{$detalle->nombre_producto}} (${{$detalle->cantidad * $detalle->precio_producto}})</li>
                        @endforeach
                    </ul>
                    <h3 class="text-white h4 mt-3sssss">Importe total</h3>
                    <p>{{$pedido->precio_total}}</p>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif




@endsection