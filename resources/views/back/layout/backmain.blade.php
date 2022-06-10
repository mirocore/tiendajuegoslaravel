<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="<?= url('css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?=url("css/fontawesome/css/all.css");?>">
    <link rel="stylesheet" href="<?=url("css/back-styles.css");?>">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link href="<?=url("plugin/select2/dist/css/select2.min.css");?>" rel="stylesheet" />

</head>
<body>

    
<header>
    
    <nav class="mb-1 navbar navbar-expand-lg" id="navegador">
      <a class="navbar-brand text-white" href="#">La casa del gamer</a>
      
      <button class="navbar-toggler text-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
        aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars mr-0"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
       @if(Auth::check())
        <ul class="navbar-nav ml-auto">
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">
              <i class="fas fa-home"></i> Inicio
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('pedidos.index')}}">
              <i class="fas fa-shopping-cart"></i> Pedidos
            </a>
          </li> 
           
           <li class="nav-item">
            <a class="nav-link" href="{{route('productos.index')}}">
              <i class="fas fa-gamepad"></i> Productos
            </a>
          </li> 
           
           <li class="nav-item">
            <a class="nav-link" href="{{route('usuarios.index')}}">
              <i class="fas fa-users"></i> Usuarios
            </a>
          </li> 
          
            <li class="nav-item-divider"></li>         
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user"></i> {{ Auth::user()->nombre . " " . Auth::user()->apellido }} </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
                  <a class="dropdown-item" href="{{route('usuarios.ver', ['id' => Auth::user()->id_usuario])}}">Mi Cuenta</a>
                  <a class="dropdown-item" href="{{route('auth.logout')}}">Cerrar Sesión</a>
                </div>
          </li>
        </ul>
        @endif
      </div>
    </nav>

</header>
 

      
<div id="contenedorGeneral" class="py-5">
   <div class="container">
        @yield("main")
   </div>
</div> 
   
<footer class="py-3 px-3" id="bottom">
   <div class="container">
       <div class="row">
           <div class="col">
               <p class="text-center mb-0">Ramiro Facundo Belcore</p>
               <p class="text-center mb-0">Quinto Cuatrimestre - Carrera de Diseño Web y Programación</p>
           </div>
       </div>
   </div>
</footer>   
    
<script src="<?=url("js/jquery-3.2.1.min.js");?>"></script>
<script src="<?=url("js/bootstrap.bundle.min.js");?>"></script>
<script src="<?=url("plugin/select2/dist/js/select2.js");?>"</script> 
  
    <script>
        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })    
    </script> 
      
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?=url("js/bootstrap.js");?>"></script>   
</body>
</html>