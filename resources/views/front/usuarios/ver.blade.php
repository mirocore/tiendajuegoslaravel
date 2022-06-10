<?php

use App\Models\Usuario;

/** @var Usuario $usuario */

?>


@extends('front.layout.frontmain')


@section('title')
    Datos del perfil
@endsection
   
   
@section('main')

@if(Session::has('success-message'))
        <div class="msj msj-ok mb-3"><p>{{Session::get('success-message')}}</p></div>
   @endif    
            
<div class="row mb-4">
    <div class="col">
        <h2 class="">Datos de perfil</h2>
    </div>
</div>    
   
<div class="row border p-3 bg-light relative">
    <div class="col-sm-4 ">
        @if($usuario->avatar)
            <img src="{{url( 'img/usuarios/' . $usuario->avatar )}}" alt="{{$usuario->apellido . $usuario->nombre}}" class="img-fluid">
        @else
            <img src="{{url( 'img/sinavatar.jpg' )}}" alt="{{$usuario->apellido . $usuario->nombre}}" class="img-fluid">
        @endif
    </div>
    <div class="col-sm-8 profile py-3">
        <h3 class="h5 mb-0">Nombre Completo</h3>
        <p class="nombre">{{$usuario->nombre . " " . $usuario->apellido}}</p>
        <h3 class="h5 mt-4">Email</h3>
        <p class="">{{$usuario->email}}</p>
        <h3 class="h5 mt-4">Miembro desde </h3>
        <p class="">{{$usuario->created_at}}</p>

        
        <a href="{{route('usuarios.front.form-editar', ['id' => $usuario->id_usuario])}}" class="btn btn-info profile-edit">Editar datos</a>
    </div>
</div>   
    
@endsection