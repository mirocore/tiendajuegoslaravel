<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;


class AuthController extends Controller
{
    public function mostrarLogin()
    {
        return view('back/auth/login');
    }
    
    public function doLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        
        // VERIFICO
        if(!Auth::attempt(['password' => $password, 'email' => $email])) {
            return redirect()->route('auth.index')
                    ->withInput()
                    ->with('error-message', 'Las credenciales ingresadas no coinciden con nuestro registros.');
        }
        
        //USUARIO
        $usuario = Usuario::where('email', "=", $email)->get();
        $usuario = $usuario[0];
        
        // ESTA LOGUEADO
        return redirect()->route('admin.index')
                ->with('success-message', 'Bienvenido al sitio ' .  $usuario->nombre);  
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.index')
                ->with('success-message', 'Sesión cerrada. Muchas Gracias');
    } 
    
    public function logoutFront(Request $request)
    {      
        if(Session::has('carrito')){
            $request->Session()->forget('carrito');
        }
        
        Auth::logout();

        return redirect()->route('Home')
                ->with('success-message', 'Sesión cerrada. Gracias vuelva pronto.');
    }
    
    public function mostrarLoginFront()
    {
        return view('front/auth/login');
    }
    
    public function doLoginFront(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        
        
        
        // VERIFICO
        if(!Auth::attempt(['password' => $password, 'email' => $email])) {
            return redirect()->route('auth.front.index')
                    ->withInput()
                    ->with('error-message', 'Las credenciales ingresadas no coinciden con nuestro registros.');
        }
        

        
        // ESTA LOGUEADO
        return redirect()->route('Home')
                ->with('success-message', 'Bienvenido al sitio ' . Auth::user()->nombre);  
    }  
    
    
    
}
