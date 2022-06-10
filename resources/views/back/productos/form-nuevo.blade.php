<?php

use App\Models\Categoria;
use App\Models\Consola;
use App\Models\Marca;
use App\Models\Genero;
use Illuminate\Support\ViewErrorBag;

/**  @var ViewErrorBag $errors */
/** @var Categoria[]|\Illuminate\Database\Eloquent\Collection $categorias */
/** @var Consola[]|\Illuminate\Database\Eloquent\Collection $consolas */
/** @var Marca[]|\Illuminate\Database\Eloquent\Collection $marcas */
/** @var Genero[]|\Illuminate\Database\Eloquent\Collection $generos */

?>


@extends('back.layout.backmain')


@section('title')
    Crear producto
@endsection


@section('main')
    <div class="row mb-4">
        <div class="col">
            <a href="{{route('productos.index')}}">Volver al listado</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <h1 class="titulo">Añadir producto nuevo</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <div class="card p-4">
               <h2 class="h4 border-bottom text-white pb-2 mb-4 font-weight-bold">Datos del producto</h2>
                <form action="{{route('productos.crear')}}" method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                       <div class="form-group col">
                           <label for="nombre">Nombre del producto</label>
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
                   </div>
                    
                    
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="precio">Precio</label>
                        <input 
                            type="text"
                            id="precio"
                            name="precio"
                            class="form-control"
                            value="{{old('precio')}}"
                        >
                        @if($errors->has('precio'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('precio')}}</p></div>
                           @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="precio">Stock</label>
                        <input 
                            type="text"
                            id="stock"
                            name="stock"
                            class="form-control"
                            value="{{old('stock')}}"
                        >
                        @if($errors->has('stock'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('stock')}}</p></div>
                           @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="estado">Estado</label>
                        <select 
                            id="estado"
                            name="estado"
                            class="form-control"
                        >
                        <option value="">Seleccionar estado</option>
                        <option value="1" {{ old('estado') == '1' ? 'selected' : '' }}>Disponible</option>
                        <option value="0" {{ old('estado') == '0' ? 'selected' : '' }} >No disponible</option>
                        </select>
                        @if($errors->has('estado'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('estado')}}</p></div>
                           @endif
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="id_categoria">Categoría</label>
                        <select name="id_categoria" id="id_categoria" class="form-control">
                           <option value="">Seleccionar categoría</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id_categoria}} {{ old('id_categoria') == $categoria->id_categoria ? 'selected' : '' }}">{{$categoria->nombre_categoria}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('id_categoria'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('id_categoria')}}</p></div>
                           @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_consola">Consola</label>
                        <select name="id_consola" id="id_consola" class="form-control">
                           <option value="">Seleccionar Consola</option>
                            @foreach($consolas as $consola)
                                <option value="{{$consola->id_consola}}" {{ old('id_consola') == $consola->id_consola ? 'selected' : '' }}>{{$consola->nombre_consola}}</option>
                            @endforeach
                        </select>
                    </div>
                       <div class="form-group col">
                        <label for="id_marca">Marca</label>
                        <select name="id_marca" id="id_marca" class="form-control">
                           <option value="">Seleccionar Marca</option>
                            @foreach($marcas as $marca)
                                <option value="{{$marca->id_marca}}" {{ old('id_marca') == $marca->id_marca ? 'selected' : '' }}>{{$marca->nombre_marca}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col">
                        <label for="generos">Géneros</label>
                        <select id="listaGeneros" class="js-example-basic-multiple form-control mb-2" name="id_genero[]" multiple="multiple">
                            @foreach($generos as $genero)
                                <option value="{{$genero->id_genero}}">{{$genero->nombre_genero}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="form-row">
                       <div class="form-group col">
                           <label for="descripcion">Descripción</label>
                           <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control">{{ old('descripcion') }}</textarea>
                       </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="d-block form-control" id="imagen" name="imagen">
                        @if($errors->has('imagen'))
                               <div class="mt-2 msj msj-error"><p>{{$errors->first('imagen')}}</p></div>
                           @endif
                    </div>
                </div>
                
                <button class="btn btn-primary btn-block rounded-0">Crear Producto</button>
                
                </form>
            </div>
        </div>
    </div>
    
    
<script src="<?=url("js/jquery-3.2.1.min.js");?>"></script>
<script>
$(document).ready(function() {
    $('#listaGeneros').select2({
      placeholder: 'Seleccionar generos',
      allowClear: true
    });    
});  
</script>

@endsection