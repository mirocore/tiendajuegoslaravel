<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// FRONTEND

Route::get('/', [
    'uses' => 'HomeController@index',
    'as' => 'Home'
]);

Route::get('tienda', [
    'uses' => 'TiendaController@index',
    'as' => 'tienda.index'
]);

Route::get('tienda/{id}', [
    'uses' => 'TiendaController@ver',
    'as' => 'tienda.ver'
])->where('id', '\d+');

Route::get('tienda/{elemento}/{id}', [
    'uses' => 'TiendaController@filtrar',
    'as' => 'tienda.filtro'
]);

Route::get('busqueda}}', [
        'uses' => 'TiendaController@buscar',
        'as' => 'tienda.buscar'
    ]);


Route::get('login', [
    'uses' => 'AuthController@mostrarLoginFront',
    'as' => 'auth.front.index'
]);

Route::post('login/ingresar', [
    'uses' => 'AuthController@doLoginFront',
    'as' => 'auth.doLoginFront'
]);

Route::get('logout/salir', [
    'uses' => 'AuthController@logoutFront',
    'as' => 'auth.front.logout',
]);

Route::get('registro/nuevo', [
    'uses' => 'UsuariosController@formUserNuevo',
    'as' => 'usuarios.front.form-nuevo',
]);

Route::post('registro/usuario/nuevo', [
        'uses' => 'UsuariosController@crearFront',
        'as' => 'usuarios.front.crear'
    ]);

Route::get('perfil/{usuario}', [
    'uses' => 'UsuariosController@verFront',
    'as' => 'usuarios.front.ver',
]);

Route::get('usuarios/editar/{usuario}', [
    'uses' => 'UsuariosController@formEditarFront',
    'as' => 'usuarios.front.form-editar'
    ]);

Route::delete('usuarios/eliminar/{id}', [
    'uses' => 'UsuariosController@eliminarFront',
    'as' => 'usuarios.front.eliminar'
    ])->where('id', '\d+');

Route::put('perfil/{usuario}/editar', [
        'uses' => 'UsuariosController@editarFront',
        'as' => 'usuarios.front.editar'
    ]);


/*================================================
                CARRITO
================================================ */
/* Agregar Item */
Route::get('carrito/{id}/nuevo', [
        'uses' => 'CarritoController@addItem',
        'as' => 'carrito.additem'
    ]);

/* Limpiar Carrito */
Route::get('carrito/limpiarcarrito', [
        'uses' => 'CarritoController@removeAll',
        'as' => 'carrito.removeall'
    ]);

/* Remover Item */
Route::get('carrito/removeritem/{id}', [
        'uses' => 'CarritoController@removeItem',
        'as' => 'carrito.removeItem'
    ]);

/* Checkout */
Route::get('checkout', [
        'uses' => 'CarritoController@checkout',
        'as' => 'carrito.checkout'
    ]);

/* Confirmar compra */
Route::get('checkout/confirmar', [
        'uses' => 'PedidosController@confirmar',
        'as' => 'carrito.confirmar'
    ]);

//--------------------------------------------------------------------------------------------------

// BACKEND


Route::get('admin/login', [
    'uses' => 'AuthController@mostrarLogin',
    'as' => 'auth.index'
]);

Route::post('login', [
    'uses' => 'AuthController@doLogin',
    'as' => 'auth.doLogin'
]);

Route::get('logout', [
    'uses' => 'AuthController@logout',
    'as' => 'auth.logout',
]);


Route::middleware(['auth'])->group(function() {
    
    
Route::middleware(['admin'])->group(function() {    
Route::get('admin', [
    'uses' => 'AdminController@index',
    'as' => 'admin.index'
    ]);

//--------------------------------------------------------------------------------------------------
    
    
Route::get('admin/pedidos', [
    'uses' => 'PedidosController@index',
    'as' => 'pedidos.index'
    ]);
    
Route::get('admin/pedidos/{id}', [
    'uses' => 'PedidosController@ver',
    'as' => 'pedidos.ver'
    ])->where('id', '\d+');    

//--------------------------------------------------------------------------------------------------

Route::get('admin/productos', [
    'uses' => 'ProductosController@index',
    'as' => 'productos.index'
    ]);

Route::get('admin/productos/{id}', [
    'uses' => 'ProductosController@ver',
    'as' => 'productos.ver'
    ])->where('id', '\d+');

Route::get('admin/productos/nuevo', [
    'uses' => 'ProductosController@formNuevo',
    'as' => 'productos.form-nuevo'
    ]);

Route::post('admin/productos/nuevo', [
        'uses' => 'ProductosController@crear',
        'as' => 'productos.crear'
    ]);

Route::delete('admin/productos/eliminar/{id}', [
    'uses' => 'ProductosController@eliminar',
    'as' => 'productos.eliminar'
    ]);

Route::get('admin/productos/editar/{producto}', [
    'uses' => 'ProductosController@formEditar',
    'as' => 'productos.form-editar'
    ]);

Route::put('productos/{producto}/editar', [
        'uses' => 'ProductosController@editar',
        'as' => 'productos.editar'
    ]);

//--------------------------------------------------------------------------------------------------

Route::get('admin/usuarios', [
    'uses' => 'UsuariosController@index',
    'as' => 'usuarios.index'
    ]);
    
Route::get('admin/usuarios/{id}', [
    'uses' => 'UsuariosController@ver',
    'as' => 'usuarios.ver'
    ])->where('id', '\d+');    
    
Route::get('admin/usuarios/nuevo', [
    'uses' => 'UsuariosController@formNuevo',
    'as' => 'usuarios.form-nuevo'
    ]);
    
Route::post('admin/usuarios/nuevo', [
        'uses' => 'UsuariosController@crear',
        'as' => 'usuarios.crear'
    ]); 
    
Route::delete('admin/usuarios/eliminar/{id}', [
    'uses' => 'UsuariosController@eliminar',
    'as' => 'usuarios.eliminar'
    ]);
    
Route::get('admin/usuarios/editar/{usuario}', [
    'uses' => 'UsuariosController@formEditar',
    'as' => 'usuarios.form-editar'
    ]); 
    
Route::put('usuarios/{usuario}/editar', [
        'uses' => 'UsuariosController@editar',
        'as' => 'usuarios.editar'
    ]);    
    
});
});