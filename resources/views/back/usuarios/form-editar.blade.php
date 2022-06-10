<?php

use App\Models\Usuario;
use Illuminate\Support\ViewErrorBag;

/** @var Usuario $usuario */
/** @var ViewErrorBag $errors */

// VALUES
$value_nombre = old('nombre') ?? $usuario->nombre;
$value_apellido = old('apellido') ?? $usuario->apellido;
$value_email = old('email') ?? $usuario->email;
$value_id_rol = old('id_rol') ?? $usuario->id_rol;


?>

@extends('back.layout.backmain')


@section('title')
Editar Usuario
@endsection

@section('main')


    <div class="row mb-4">
        <div class="col">
            <a href="{{route('usuarios.index')}}">Volver al listado</a>
        </div>
    </div>
    
<!-- =====================
    MENSAJE DE ERROR
===================== -->
<div class="row">
      @if(Session::has('error'))
       <div class="col">
           <div class="msj msj-error"><p>{{Session::get('error')}}</p></div>
       </div>
      @endif
</div>      
    
    <div class="row">
        <div class="col">
            <h2 class="titulo">Editar datos de usuario</h2>
        </div>
    </div>
    
    <div class="row">
        @if($usuario->avatar)
           <div class="col-sm-3">
               <div class="card p-4">
                   <img src="{{url('img/usuarios/' . $usuario->avatar)}}" alt="{{$usuario->apellido}}" class="img-fluid rounded-circle" />
               </div>
           </div>
        @endif 
        <div class="col">
            <div class="card p-4">
              <h3 class="h4 border-bottom text-white pb-2 mb-4 font-weight-bold">Datos del usuario</h3>
              <form action="{{route('usuarios.editar', ['$id' => $usuario->id_usuario])}}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="form-row">
                       <div class="form-group col-md-4">
                           <label for="nombre">Nombre</label>
                           <input     
                               type="text"
                               id="nombre"
                               name="nombre"
                               class="form-control"
                               value="{{$value_nombre}}"
                           >
                           @if($errors->has('nombre'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('nombre')}}</p></div>
                           @endif
                       </div>
                       <div class="form-group col-md-4">
                           <label for="apellido">Apellido</label>
                           <input     
                               type="text"
                               id="apellido"
                               name="apellido"
                               class="form-control"
                               value="{{$value_apellido}}"
                           >
                           @if($errors->has('apellido'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('apellido')}}</p></div>
                           @endif
                       </div>
                       <div class="form-group col-md-4">
                           <label for="id_rol">Rol</label>
                           <select name="id_rol" id="id_rol" class="form-control">
                               <option value="">Seleccionar rol</option>
                               <option value="1" {{$value_id_rol == 1 ? 'selected': ''}}>Administrador</option>
                               <option value="2" {{$value_id_rol == 2 ? 'selected': ''}}>Usuario</option>
                           </select>
                       </div>
                   </div>
                   
                   <div class="form-row">
                       <div class="form-group col-md-6">
                           <label for="email">Email</label>
                           <input     
                               type="email"
                               id="email"
                               name="email"
                               class="form-control"
                               value="{{$value_email}}"
                           >
                           @if($errors->has('email'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('email')}}</p></div>
                           @endif
                       </div>
                       <div class="form-group col-md-6">
                           <label for="password">Contraseña</label>
                           <input     
                               type="password"
                               id="password"
                               name="password"
                               class="form-control"
                               value=""
                           >
                           @if($errors->has('password'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('password')}}</p></div>
                           @endif
                       </div>
                   </div>
                   
                <div class="form-row">
                    <div class="form-group col">
                        <label for="avatar">Imagen de avatar</label>
                        <input type="file" class="d-block form-control" id="avatar" name="avatar">
                        @if($errors->has('avatar'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('avatar')}}</p></div>
                           @endif
                    </div>
                </div>
                  
                <button class="btn btn-primary btn-block rounded-0">Editar datos</button>  
                   
              </form>  
            </div>
        </div>
    </div>
@endsection

