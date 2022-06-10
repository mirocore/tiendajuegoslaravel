@extends('back.layout.backmain')


@section('title')
    Bienvenido al backend
@endsection


@section('main')
   
   @if(Session::has('success-message'))
    <div class="row">
        <div class="col">
            <div class="msj msj-ok mb-3"><p>{{Session::get('success-message')}}</p></div>
        </div>
    </div>   
   @endif
   
   <div class="row">
        <div class="col">
            <h2 class="titulo">Seleccionar tabla</h2>
        </div>
    </div>
   
   <div class="row card p-4">
        <div class="col">
           <div class="row">
                   <div class="col" >
                        <a href="{{route('pedidos.index')}}" class="inicio-atajos">
                             <div>
                                 <i class="fas fa-shopping-cart"></i>
                                 <p>Lista de pedidos</p>
                             </div>
                        </a>
                   </div>
                   
                   <div class="col" >
                        <a href="{{route('productos.index')}}" class="inicio-atajos">
                             <div>
                                 <i class="fas fa-gamepad"></i>
                                 <p>Lista de productos</p>
                             </div>
                        </a>
                   </div>    
                   
                   <div class="col" >
                        <a href="{{route('usuarios.index')}}" class="inicio-atajos">
                             <div>
                                 <i class="fas fa-users"></i>
                                 <p>Lista de usuarios</p>
                             </div>
                        </a>
                   </div>
                                                         
               </div>
        </div>
   </div>
   
@endsection