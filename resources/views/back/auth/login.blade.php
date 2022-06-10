@extends('back.layout.backmain')

@section('title')
Ingresar
@endsection


@section('main')

@if(Session::has('success-message'))
           <div class="row">
               <div class="col">
                    <div class="msj msj-ok mt-3"><p>{{Session::get('success-message')}}</p></div>
               </div>
           </div>
@endif

<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <div class="card text-center p-5">
            <h1 class="h3 font-weight-bold mb-5">Ingrese a su cuenta</h1>
            <form action="{{route('auth.doLogin')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email" class="sr-only">Email</label>
                    <input 
                        type="text"
                        class="form-control"
                        name="email"
                        id="email"
                        placeholder="Email"
                    >
                </div>
                <div class="form-group">
                        <label class="sr-only" for="password">Contraseña</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                    </div>
                    <button class="btn btn-primary btn-block mt-5 rounded-0 text-uppercase">Ingresar</button> 
            </form>
            @if(Session::has('error-message'))
            <div class="msj msj-error mt-3"><p>{{Session::get('error-message')}}</p></div>
            @endif
        </div>
    </div>
</div>


@endsection