@extends('front.layout.frontmain')

@section('title')
Filtro
@endsection


@section('main')
<div class="row">
    <div class="col-md-3">
        <div class="filtros">
            <h2>Catálogo</h2>
            
            <div class="filtros-group">
                <h3>Consolas</h3>
                <ul class="list-unstyled">
                    @foreach($consolas as $consola)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'consola', 'id' => $consola->id_consola])}}" 
                        class="{{
                        $elemento == "consola" && $id == $consola->id_consola ? 'filtro-activo' : '' 
                        }}" >{{$consola->nombre_consola}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="filtros-group">
                <h3>Categorías</h3>
                <ul class="list-unstyled">
                    @foreach($categorias as $categoria)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'categoria', 'id' => $categoria->id_categoria])}}" 
                        class="{{
                        $elemento == 'categoria' && $id == $categoria->id_categoria ? 'filtro-activo' : '' 
                        }}
                        ">{{$categoria->nombre_categoria}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="filtros-group">
                <h3>Géneros</h3>
                <ul class="list-unstyled">
                    @foreach($generos as $genero)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'generos', 'id' => $genero->id_genero])}}"
                        class="{{
                        $elemento == 'generos' && $id == $genero->id_genero ? 'filtro-activo' : '' 
                        }}"
                        >{{$genero->nombre_genero}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
        
        @if(count($productos) > 0)
        @foreach($productos as $producto)
<?php
// IMAGEN DEL PRODUCTO
if($producto->imagen){
    $img_producto = 'productos/' . $producto->imagen;
}else{
    $img_producto = 'sinimagen.jpg';
}
?>           
            <div class="col-sm-4 mb-2">
            <div class="producto-tienda">
                <a href="{{route('tienda.ver', ['id' => $producto->id_producto])}}">
                   <figure>
                    <img src="{{url('img/' . $img_producto)}}" alt="{{$producto->nombre}}" class="img-fluid">
                     <figcaption>
                        <p class="text-primary h4 font-weight-bold">${{$producto->precio}}</p>
                        <p class="text-muted my-2"><small>{{$producto->consola->nombre_consola}}</small></p>
                        <h2>{{$producto->nombre}}</h2>
                        @if($producto->stock == 0)
                        <p class="p-2 bg-danger text-white d-inline sin-stock">Sin Stock</p>
                       @endif
                     </figcaption> 
                     <p class="d-inline p-2 producto-categ">{{$producto->categoria->nombre_categoria}}</p> 
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
            </div>
        @endforeach
        @else
           <div class="col">
                <p class="bg-secondary text-white text-center d-block p-5">No se ha encontrado ningún producto que coincida con la búsqueda.</p>
           </div>
        @endif
        
        </div>
        <div class="row">
            <div class="col">
                <div class="myPagination float-right mr-2 rounded-0">{{$productos->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection