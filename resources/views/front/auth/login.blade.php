@extends('front.layout.frontmain')

@section('title')
Ingresar
@endsection


@section('main')

@if(Session::has('error-message'))
<div class="row">
    <div class="col">
     <div class="msj msj-error mb-3"><p>{{Session::get('error-message')}}</p></div>
    </div>
</div>
@endif

@if(Session::has('success-message'))
<div class="row">
    <div class="col">
     <div class="msj msj-ok mb-3"><p>{{Session::get('success-message')}}</p></div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="p-4 border">
          
       <h2 class="text-center mb-5">Ingresar Cuenta</h2>
        <form action="{{route('auth.doLoginFront')}}" method="post" class="">
           @csrf
            <div class="form-group">
                <label for="email" class="sr-only">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Usuario (email)">
            </div>
            <div class="form-group">
                <label for="password" class="sr-only">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
            </div>
            <input class="btn btn-info btn-block rounded-0" value="Ingresar" type="submit">
        </form>
      </div>
        
        <a href="" class="btn btn-primary btn-block mt-5 rounded-0">Crear cuenta nueva</a>        
    </div>
</div>

@endsection