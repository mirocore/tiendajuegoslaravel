<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\Pedido_detalle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index(){
        $usuarios = Usuario::all();
        
        return view('back/usuarios/listado', compact('usuarios'));
    }
    
    public function ver($id){
        // DATOS DEL USUARIO
        $usuario = Usuario::findOrFail($id);
        
        // DATOS DE SUS COMPRAS
        $pedidos = Pedido::where('id_usuario', '=', $usuario->id_usuario)->get();
        foreach($pedidos as $pedido){
            $detalles = Pedido_detalle::where('id_pedido', '=', $pedido->id_pedido)->get();
            $pedido->detalles = $detalles;
        }
        
        
        return view('back/usuarios/ver', compact('usuario', 'pedidos') );
    }
    
    public function formNuevo()
    {
        return view('back/usuarios/form-nuevo');
    }
    
    public function crear(Request $request)
    {
        // DATOS RECIBIDOS
        $datosRecibidos = $request->input();
        
        // VALIDACION
        $request->validate(Usuario::$rulesCrear, Usuario::$messages);
        
        // VERIFICO QUE EL EMAIL NO ESTÉ REPETIDO
        $test = Usuario::where('email', '=', $request->email)->get();
        if(count($test) != 0){
            return back()
                ->withInput()
                ->with('error', 'El email ingresado ya existe en nuestros registros.');
        }
        
        
        // IMAGEN
        if($request->avatar){
            $imagen = $request->avatar;
                // NOMBRE DE LA IMAGEN
                $imagenNombre = time() . "." . $imagen->extension();
                // MUEVO LA IMAGEN
                $imagen->move(public_path('/img/usuarios'), $imagenNombre);
                // GUARDO LA IMAGEN
                $datosRecibidos['avatar'] = $imagenNombre;
        }else{
            $datosRecibidos['avatar'] = '';
        }
        
        
        // CREAR NUEVO REGISTRO
        $usuario = Usuario::create($datosRecibidos);
        
        
        // VOLVER AL LISTADO
        return redirect()->route('usuarios.index')
                ->with('success', 'El usuario ' . $usuario->nombre . ' ' .$usuario->apellido . ' ha sido ingresado a la base de datos.');
        
    }
    
    public function eliminar($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        
        return redirect()->route('usuarios.index')
            ->with('success', 'El usuario ' . $usuario->nombre . ' ' .$usuario->apellido . ' ha sido eliminado a la base de datos.');
    }
    
    public function formEditar(Usuario $usuario)
    {
        return view('back/usuarios/form-editar', compact('usuario'));
    }
    
    public function editar(Request $request, Usuario $usuario)
    {
        // DATOS RECIBIDOS
        $data = $request->input();
        
        // VALIDAR
        $request->validate(Usuario::$rulesEditar, Usuario::$messages);
        

        
        // AVATAR
        if($request->avatar){
            $imagen = $request->avatar;
            $imagenNombre = time() . "." . $imagen->extension();
            $imagen->move(public_path('/img/usuarios/'), $imagenNombre);
            $data['avatar'] = $imagenNombre;
        }
        
        // CONTRASEÑA
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }else{
            $data['password'] = $usuario->password;
        }
        
        // GUARDO LOS CAMBIOS
        $usuario->update($data);
        
        // VOLVER AL LISTADO
        return redirect()->route('usuarios.index')
                ->with('success', 'Los datos del usuario ' . $usuario->nombre . ' ' .$usuario->apellido . ' han sido actualizados.');
        
        
    }
    
    public function formUserNuevo()
    {
        return view('front/usuarios/form-nuevo');
    }
    
    public function crearFront(Request $request){
        // VALIDACION
        $request->validate(Usuario::$rules, Usuario::$messages);
        
        // DATOS RECIBIDOS
        $data = $request->input();
        
        // ROL
        $data['id_rol'] = 2;
        
        // VERIFICO QUE EL EMAIL NO ESTÉ REPETIDO
        $test = Usuario::where('email', '=', $request->email)->get();
        if(count($test) != 0){
            return back()
                ->withInput()
                ->with('error', 'El email ingresado ya existe en nuestros registros.');
        }
        
        // IMAGEN
        if($request->avatar){
            $imagen = $request->avatar;
                // NOMBRE DE LA IMAGEN
                $imagenNombre = time() . "." . $imagen->extension();
                // MUEVO LA IMAGEN
                $imagen->move(public_path('/img/usuarios/'), $imagenNombre);
                // GUARDO LA IMAGEN
                $data['avatar'] = $imagenNombre;
        }else{
            $data['avatar'] = '';
        }
        
        // CONTRASEÑA
        $data['password'] = Hash::make($data['password']);
        
        // CREAR NUEVO REGISTRO
        $usuario = Usuario::create($data);
        
        
        // VOLVER AL LISTADO
        return redirect()->route('auth.front.index')
                ->with('success-message', '¡Felicidades! Sus datos han sido ingresados con éxito. Por favor ingrese sus datos para poder ingresar a su cuenta.');
    }
    
    public function verFront($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        return view('front/usuarios/ver', compact('usuario'));
    }
    
    public function formEditarFront(Usuario $usuario)
    {
        return view('front/usuarios/form-editar', compact('usuario'));
    }
    
    public function eliminarFront($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        
        // ESTA LOGUEADO
        return redirect()->route('Home')
                ->with('success-message', 'Su cuenta ha sido eliminada exitósamente. Por favor vuelva pronto.');  
    }
    
    public function editarFront(Usuario $usuario, Request $request){
        // DATOS RECIBIDOS
        $data = $request->input();
        
        // VALIDAR
        $request->validate(Usuario::$rulesEditar, Usuario::$messages);
        
        // AVATAR
        if($request->avatar){
            $imagen = $request->avatar;
            $imagenNombre = time() . "." . $imagen->extension();
            $imagen->move(public_path('/img/usuarios/'), $imagenNombre);
            $data['avatar'] = $imagenNombre;
        }
        
        // CONTRASEÑA
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }else{
            $data['password'] = $usuario->password;
        }
        
        // GUARDO LOS CAMBIOS
        $usuario->update($data);
        
        // VOLVER AL LISTADO
        return redirect()->route('Home')
                ->with('success-message', 'Los datos de su perfil han sido actualizados exitósamente.');
    }
    
}
