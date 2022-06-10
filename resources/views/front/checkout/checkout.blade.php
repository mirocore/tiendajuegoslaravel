@extends('front.layout.frontmain')


@section('title')
    Checkout
@endsection


@section('main')  

@if(Session::has('error-message'))
<div class="row">
    <div class="col">
        <div class="msj msj-error mb-3"><p>{{Session::get('error-message')}}</p></div>
    </div>
</div>
@endif   
       
    <div class="row">
        <div class="col-sm-8">
           <div class="table-responsive">
               
            <h2 class="titulo mb-4">Lista de productos</h2>
               
                <table class="table">
                    <thead>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        @foreach($pedido_detalles as $dato)
                        <tr>
                            <td>{{$dato['nombre_producto']}}</td>
                            <td>${{$dato['precio_producto']}}</td>
                            <td>{{$dato['cantidad']}}</td>
                            <td class="font-weight-bold">${{$dato['precio_producto'] * $dato['cantidad']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
           </div>
            <p class="text-right h3 border-top border-bottom py-3 my-2">Precio Total: <span class="font-weight-bold">${{$pedido['precio_total']}}</span></p>
        </div>
        <div class="col-sm-4 border p-3 bg-light">
           <h2 class="titulo border-bottom pb-2 mb-4">Datos del usuario</h2>
            <h3 class="font-weight-bold h5">Nombre:</h3>
            <p>{{$usuario->nombre}} {{$usuario->apellido}}</p>
            <h3 class="font-weight-bold h5">Email:</h3>
            <p>{{$usuario->email}}</p>
        </div>
        
        <a href="{{route('carrito.confirmar')}}" class="btn btn-primary text-right rounded-0 btn-lg mt-3 ml-auto" onclick="return confirm('¿Está seguro que desea realizar ésta operación?');">Confirmar compra</a>
        
    </div>
    
    
        
@endsection