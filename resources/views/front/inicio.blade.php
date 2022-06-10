


@extends('front.layout.frontmain')


@section('title')
    Bienvenido
@endsection


@section('main')
   
<!-- ==========================================
                  CONSOLAS
========================================== -->
@if(Session::has('success-message'))
<div class="row">
    <div class="col">
        <div class="msj msj-ok mb-3"><p>{{Session::get('success-message')}}</p></div>
    </div>
</div>
@endif



<div class="row">
    <div class="col-sm-4">
       <a href="{{route('tienda.filtro', ['elemento' => 'consola', 'id' => 3])}}">
        <figure class="home-consola">
            <img src="{{url('img/consolas/switch.png')}}" alt="Nintendo Switch" class="img-fluid">
            <figcaption>
                <h2>Nintendo Switch</h2>
            </figcaption>
        </figure>
       </a>
    </div>
    <div class="col-sm-4">
       <a href="{{route('tienda.filtro', ['elemento' => 'consola', 'id' => 1])}}">
        <figure class="home-consola">
            <img src="{{url('img/consolas/ps4.png')}}" alt="PS4" class="img-fluid">
            <figcaption>
                <h2>PS4</h2>
            </figcaption>
        </figure>
       </a>
    </div>
      <div class="col-sm-4">
       <a href="{{route('tienda.filtro', ['elemento' => 'consola', 'id' => 5])}}">
        <figure class="home-consola">
            <img src="{{url('img/consolas/xbox.png')}}" alt="Xbox One" class="img-fluid">
            <figcaption>
                <h2>Xbox One</h2>
            </figcaption>
        </figure>
       </a>
    </div>
</div>        
         
<!-- ==========================================
              ULTIMOS INGRESOS   
========================================== -->
    <div class="row mt-4  py-4">
        <div class="col">
            <h2 class="font-weight-bold subtitulo">Últimos ingresos </h2>
            <div class="brand-carousel owl-carousel section-padding mt-5">
              
               
                @foreach($productos as $producto)
                <?php

                // IMAGEN DEL PRODUCTO
                if($producto->imagen){
                    $img_producto = 'productos/' . $producto->imagen;
                }else{
                    $img_producto = 'sinimagen.jpg';
                }

                ?>                
                
                 <div class="producto-carrousel">  
                  <a href="{{ route('tienda.ver', ['id' => $producto->id_producto]) }}">
                   <figure>
                    <img src="{{url('img/' . $img_producto)}}" alt="{{$producto->nombre}}">
                    <figcaption>
                        <p class="text-primary h4 font-weight-bold">${{$producto->precio}}</p>
                        <h3>{{$producto->nombre}}</h3>
                    </figcaption>
                   </figure>
                  </a>
                   @if(Auth::check())
                       @if($producto->stock == 0)
                       <button class="btn btn-danger mx-auto rounded-0 mt-2">Sin Stock</button>
                       @else
                        <a href="{{route('carrito.additem', ['id' => $producto->id_producto])}}" class="add-cart-home btn btn-primary mx-auto rounded-0 mt-2"><i class="fas fa-shopping-cart"></i> Añadir a Carrito</a>
                       @endif
                   @endif
                 </div>
                @endforeach
                
            </div>
    </div>
    </div>
    
    
<!-- ==========================================
                  DATA EXTRA
========================================== -->

<div class="row mt-5">
    <div class="col-md-4">
        <div class="box text-center bg-primary text-uppercase py-5 text-white">
           <i class="fas fa-truck h1 mb-3"></i>
            <h2 class="m-0">Envío gratis</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box text-center bg-primary text-uppercase py-5 text-white">
           <i class="fas fa-headset  h1 mb-3"></i>
            <h2 class="m-0">Soporte Online</h2>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box text-center bg-primary text-uppercase py-5 text-white">
           <i class="fas fa-star h1 mb-3"></i>
            <h2 class="m-0">Descuentos</h2>
        </div>
    </div>
    
</div>    
            
@endsection