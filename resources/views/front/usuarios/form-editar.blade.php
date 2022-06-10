<?php

use App\Models\Usuario;
use Illuminate\Support\ViewErrorBag;

/** @var Usuario $usuario */
/** @var ViewErrorBag $errors */

// VALUES
$value_nombre = old('nombre') ?? $usuario->nombre;
$value_apellido = old('apellido') ?? $usuario->apellido;
$value_email = old('email') ?? $usuario->email;
$value_password = old('password') ?? $usuario->password;


?>


@extends('front.layout.frontmain')

@section('title')
Editar datos de perfil
@endsection

@section('main')

<div class="row mb-5">
    <div class="col">
        <h2 >Editar datos de usuario</h2>
    </div>
</div>

<div class="row">
    <div class="col">
       <div class="p-5 border bg-light">
           
        <form action="{{route('usuarios.front.editar', ['id' => $usuario->id_usuario]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col">
                    <label for="nombre">Nombre</label>
                    <input 
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="form-control rounded-0"
                        value="{{$value_nombre}}"
                        >
                        @if($errors->has('nombre'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('nombre')}}</p></div>
                           @endif
                </div>
                <div class="form-group col">
                    <label for="apellido">Apellido</label>
                    <input 
                        type="text"
                        id="apellido"
                        name="apellido"
                        class="form-control rounded-0"
                        value="{{$value_apellido}}"
                        >
                        @if($errors->has('apellido'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('apellido')}}</p></div>
                           @endif
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col">
                    <label for="email">Email</label>
                    <input 
                        type="email"
                        id="email"
                        name="email"
                        class="form-control rounded-0"
                        value="{{$value_email}}"
                        >
                        @if($errors->has('email'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('email')}}</p></div>
                           @endif
                </div>
                <div class="form-group col">
                    <label for="password">Contraseña</label>
                    <input 
                        type="password"
                        id="password"
                        name="password"
                        class="form-control rounded-0"
                        >
                        @if($errors->has('password'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('password')}}</p></div>
                           @endif
                </div>
            </div>
            <div class="form-row">
               <div class="form-group col">
                    <label for="avatar">Imagen de avatar</label>
                    <input 
                        type="file"
                        id="avatar"
                        name="avatar"
                        class="form-control"
                    >
                    @if($errors->has('avatar'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('avatar')}}</p></div>
                           @endif
               </div>
            </div>
            <div class="form-row mt-3">
                <button class="btn btn-block btn-primary rounded-0">Editar cuenta</button>
            </div>
        </form>
        
       <form action="{{route('usuarios.front.eliminar', ['id' => $usuario->id_usuario])}}" method="post">
           @csrf
           @method('DELETE')
              
              <button class="btn btn-link text-danger d-block mt-2 mx-auto" onclick="return confirm('¿Está seguro que desea borrar su cuenta de usuario? Este paso no tiene vuelta atrás.')">Eliminar cuenta</button>
       </form>

        </div>
    </div>
</div>

@endsection

