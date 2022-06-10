@extends('back.layout.backmain')


@section('title')
    Listado de Usuarios
@endsection


@section('main')

<!-- =====================
    MENSAJE DE ERROR
===================== -->
<div class="row">
      @if(Session::has('success'))
       <div class="col">
           <div class="msj msj-ok"><p>{{Session::get('success')}}</p></div>
       </div>
      @endif
</div>
   
<!-- =====================
    ADMINISTRADORES
===================== -->

<div class="row my-5">
        <div class="col">
            <a href="{{route('usuarios.form-nuevo')}}" class="rounded-0 bg-success text-white px-3 py-3">Añadir Usuario</a>
        </div>
</div>

<div class="row">
    <div class="col">
        <h1 class="titulo">Administradores</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <table class="table tablita">
                <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        @if($usuario->id_rol == 1)
                            <tr class="{{Auth::user()->id_usuario == $usuario->id_usuario ? 'usuario-destacado' : ''}}">
                                <td data-titulo="Apellido">{{$usuario->apellido}}</td>
                                <td data-titulo="Nombre">{{$usuario->nombre}}</td>
                                <td data-titulo="Email">{{$usuario->email}}</td>
                                <td class="acciones">
                                   <!-- =========================
                                            VER DETALLES
                                    ========================= --> 
                                    <a href="{{route('usuarios.ver', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Ver detalles del usuario"><i class="fas fa-search"></i></a>
                                    <!-- =========================
                                            ELIMINAR
                                    ========================= -->
                                    @if(Auth::user()->id_usuario != $usuario->id_usuario)
                                    <form action="{{route('usuarios.eliminar', ['id' => $usuario->id_usuario])}}" method="post" class="d-inline m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                           onclick="return confirm('¿Está seguro que desea borrar al usuario {{$usuario->nombre}} {{$usuario->apellido}}')"
                                           class="sinBtn"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Eliminar usuario"
                                           >
                                           <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endif
                                
                                <!-- =========================
                                            EDITAR
                                ========================= -->
                               
                                <a href="{{route('usuarios.form-editar', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Editar detalles del usuario"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row mt-5">
    <div class="col">
        <h1 class="titulo">Usuarios</h1>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <table class="table tablita">
                <thead>
                    <tr>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        @if($usuario->id_rol == 2)
                            <tr class="{{Auth::user()->id_usuario == $usuario->id_usuario ? 'usuario-destacado' : ''}}">
                                <td data-titulo="Apellido">{{$usuario->apellido}}</td>
                                <td data-titulo="Nombre">{{$usuario->nombre}}</td>
                                <td data-titulo="Email">{{$usuario->email}}</td>
                                <td class="acciones">
                                   <!-- =========================
                                            VER DETALLES
                                    ========================= --> 
                                    <a href="{{route('usuarios.ver', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Ver detalles del usuario"><i class="fas fa-search"></i></a>
                                    <!-- =========================
                                            ELIMINAR
                                    ========================= -->
                                    @if(Auth::user()->id_usuario != $usuario->id_usuario)
                                    <form action="{{route('usuarios.eliminar', ['id' => $usuario->id_usuario])}}" method="post" class="d-inline m-0 p-0">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                           onclick="return confirm('¿Está seguro que desea borrar al usuario {{$usuario->nombre}} {{$usuario->apellido}}')"
                                           class="sinBtn"
                                           data-toggle="tooltip"
                                           data-placement="top"
                                           title="Eliminar usuario"
                                           >
                                           <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    @endif
                                
                                <!-- =========================
                                            EDITAR
                                ========================= -->
                               
                                <a href="{{route('usuarios.form-editar', ['id' =>$usuario->id_usuario])}}" data-toggle="tooltip" data-placement="top" title="Editar detalles del usuario"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection