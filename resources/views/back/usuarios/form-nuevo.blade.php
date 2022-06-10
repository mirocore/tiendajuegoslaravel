<?php

use Illuminate\Support\ViewErrorBag;

/**  @var ViewErrorBag $errors */

?>


@extends('back.layout.backmain')

@section('title')
    Crear Usuario
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
            <h2 class="titulo">Añadir usuario nuevo</h2>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card p-4">
              <h3 class="h4 border-bottom text-white pb-2 mb-4 font-weight-bold">Datos del usuario</h3>
              <form action="{{route('usuarios.crear')}}" method="post" enctype="multipart/form-data">
                  @csrf
                  
                  <div class="form-row">
                       <div class="form-group col-md-4">
                           <label for="nombre">Nombre</label>
                           <input     
                               type="text"
                               id="nombre"
                               name="nombre"
                               class="form-control"
                               value="{{old('nombre')}}"
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
                               value="{{old('apellido')}}"
                           >
                           @if($errors->has('apellido'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('apellido')}}</p></div>
                           @endif
                       </div>
                       <div class="form-group col-md-4">
                           <label for="id_rol">Rol</label>
                           <select name="id_rol" id="id_rol" class="form-control">
                               <option value="">Seleccionar rol</option>
                               <option value="1">Administrador</option>
                               <option value="2">Usuario</option>
                           </select>
                            @if($errors->has('id_rol'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('id_rol')}}</p></div>
                           @endif
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
                               value="{{old('email')}}"
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
                               value="{{old('password')}}"
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
                  
                <button class="btn btn-primary btn-block rounded-0">Crear Usuario</button>  
                   
              </form>  
            </div>
        </div>
    </div>
@endsection