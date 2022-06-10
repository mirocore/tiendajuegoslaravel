<?php
    use App\Models\Categoria;
    use App\Models\Producto;
    use App\Models\Consola;
    use App\Models\Genero;
    use App\Models\Usuario;
    
    use App\Cart\Carrito;
    use App\Cart\Carritoitem;

    use Illuminate\Http\Request;

    $listaCategorias = Categoria::all();
    $listaConsolas = Consola::all();
    $listaConsolas = Consola::all();
    $listaGeneros = Genero::all();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield("title") | La casa del Gamer</title>
    <link rel="stylesheet" href="<?= url('css/bootstrap.css');?>">
    <link rel="stylesheet" href="<?=url("css/fontawesome/css/all.css");?>">
    <link rel="stylesheet" href="<?=url("css/front-styles.css");?>">
    <link href="https://fonts.googleapis.com/css?family=Dosis&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url('plugin/OwlCarousel/dist/assets/owl.carousel.css');?>">
    <link rel="stylesheet" href="<?= url('plugin/OwlCarousel/dist/assets/owl.theme.default.css');?>">

</head>
<body>
<!-- ========================
         HEADER
 ======================== -->
<header id="top">
   <div class="container">
       <div class="row">
           <div class="col-lg-4 logo">
                <h1 class=""><a href="{{route('Home')}}">La casa del gamer</a></h1>
                <div class="ml-auto h3 mr-3" id="btnMenu"><i class="fas fa-bars"></i></div>
           </div>
           <div class="col-lg-4">
                <form action="{{route('tienda.buscar')}}" class="form-inline" id="buscar">
                        @csrf
                        <label class="sr-only" for="buscar">Buscar</label>
                        <input type="text" class="form-control" id="buscar" name="buscar" placeholder="Buscar producto...">
                        <button class="btn btn-primary rounded-0">Enviar</button>
                </form>
           </div>
           <div class="col-lg-4 header-top">
                  @if( Auth::check() )
                  
                 <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i> <span class="badge badge-primary">
                            {{Session::has('carrito') ? session('carrito')->getCantidadTotal() : 0}}
                        </span>
                      </button>
                      <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                        
         @if(Session::has('carrito') && session('carrito')->getCantidadTotal() > 0)
             @foreach(session('carrito')->getItems() as $item)
                <div class="border carritoitem px-1">
                          <img src="{{url('img/productos/' . $item->getProducto()->imagen)}}" alt="{{$item->getProducto()->nombre}}" class="">
                           <div>
                                <p class="font-weight-bold" >{{$item->getProducto()->nombre}}</p>
                                <p class="text-italic text-muted" >{{$item->getCantidad()}} x {{$item->getProducto()->precio}} <span class="font-weight-bold text-info">(${{$item->getSubtotal()}})</span></p>
                           </div>
                           <a href="{{route('carrito.removeItem', ['id' => $item->getProducto()->id_producto])}}"><i class="fas fa-times"></i></a>
                </div>
             @endforeach
                       @if(Session::has('carrito'))       
                        <p class="total"><span class="font-weight-bold text-primary">Total: </span>${{session('carrito')->getTotal()}}
                        @else
                        <p class="total"><span class="font-weight-bold text-primary">Total: </span>$0
                        @endif
                        
                        </p>
                        <a href="{{route('carrito.checkout')}}" class="text-uppercase btn-checkout btn btn-block mt-1" btn-block >Checkout</a>
                      <a href="{{route('carrito.removeall')}}" class="font-italic text-danger mt-1 d-block text-center">Limpiar carrito</a>
         @endif               
                      </div>
                </div> 
                  
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i> {{Auth::user()->nombre}} {{Auth::user()->apellido}}
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{route('usuarios.front.ver', ['id' => Auth::user()->id_usuario])}}">Ver mi cuenta</a>
                        <a class="dropdown-item" href="{{route('auth.front.logout')}}">Cerrar sesión</a>
                      </div>
                </div>
                  @else
                  <div class="dropdown">
                      <button class="btn btn-secondary dropdown-toggle float-right" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user mr-2"></i> Ingresar Cuenta
                      </button>
                      <div class="dropdown-menu py-3 px-2 bg-dark" aria-labelledby="dropdownMenuButton">
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
                          <input class="btn btn-info btn-block" value="Ingresar" type="submit">
                      </form>
                      <a href="{{route('usuarios.front.form-nuevo')}}" class="btn btn-primary btn-block mt-5 rounded-0">Crear cuenta nueva</a>

                      </div>
                </div>
                  @endif
           </div>
       </div>
   </div>
</header>
 
<!-- ========================
         NAVEGADOR
 ======================== --> 
<nav id="navegador" class="">
   <div class="container">
        <ul class="list-unstyled list-inline m-0 font-weight-bold">
            <li class="list-inline-item"><a href="{{route('Home')}}">Inicio</a></li>
            <li class="list-inline-item"><a href="{{route('tienda.index')}}">Tienda</a></li>
            <li class="list-inline-item"><a href="{{route('tienda.filtro', ['elemento' => 'categoria', 'id' => 1])}}">Consolas</a></li>
            <li class="list-inline-item"><a href="{{route('tienda.filtro', ['elemento' => 'categoria', 'id' => 2])}}">Juegos</a></li>
            <li class="list-inline-item"><a href="{{route('tienda.filtro', ['elemento' => 'categoria', 'id' => 3])}}">Accesorios</a></li>
        </ul>
   </div>
</nav>
 <!-- ========================
         CUERPO
 ======================== -->  
    <div class="mt-3">
       <div class="container py-5">
            @yield("main")
       </div>
    </div>
    
  

<!-- ========================
        PIE DE PAGINA
 ======================== -->        
<footer class="mt-5 py-5" id="bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <p class="logo">La casa del gamer</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-store"></i> Calle Falsa 123</li>
                    <li><i class="far fa-envelope"></i> lacasadelgamer@gmail.com</li>
                    <li><i class="fas fa-phone-alt"></i> 123 456 789</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3 class="font-weight-bold">Consolas</h3>
                <ul class="list-unstyled">
                   @foreach($listaConsolas as $con)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'consola', 'id' => $con->id_consola])}}">{{$con->nombre_consola}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-md-3">
                <h3>Géneros</h3>
                <ul class="list-unstyled">
                    @foreach($listaGeneros as $gen)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'generos', 'id' => $gen->id_genero])}}">{{$gen->nombre_genero}}</a></li>
                    @endforeach
                </ul>
            </div>
            
            <div class="col-md-3">
                <h3>Categorías</h3>
                <ul class="list-unstyled">
                    @foreach($listaCategorias as $categ)
                        <li><a href="{{route('tienda.filtro', ['elemento' => 'categoria', 'id' => $categ->id_categoria])}}">{{$categ->nombre_categoria}}</a></li>
                    @endforeach
                </ul>
            </div>
            
        </div>
    </div>
</footer>    
    
<script src="<?=url("js/jquery-3.2.1.min.js");?>"></script>
<script src="<?=url("js/bootstrap.bundle.min.js");?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="<?=url("js/bootstrap.js");?>"></script>
<script src="<?=url("js/main.js");?>"></script>
<script src="<?=url("plugin/OwlCarousel/dist/owl.carousel.js");?>"></script>
<script src="<?=url("js/carousel.js");?>"></script>

</body>
</html>