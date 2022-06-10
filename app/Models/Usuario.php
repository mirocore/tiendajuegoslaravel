<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Usuario extends Authenticatable
{
    use Notifiable;
    
    protected $table = "usuarios";
    protected $primaryKey = "id_usuario";
    protected $fillable = ['email', 'password', 'nombre', 'apellido', 'avatar', 'id_rol'];
    protected $hidden = ['password', 'remember_token',];
    
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'id_rol', 'id_rol');
    }
    
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'usuarios_tienen_productos',
        'id_usuario', 'id_producto',
        'id_usuario', 'id_producto');
    }
    
    public static $rules = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email:rfc',
        'password' => 'required|min:7',
        'avatar' => 'mimes:jpeg,png,jpg',
    ];
    
    public static $rulesCrear = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email:rfc',
        'password' => 'required|min:7',
        'avatar' => 'mimes:jpeg,png,jpg',
        'id_rol' => 'required',
    ];
    
    public static $rulesEditar = [
        'nombre' => 'required|min:2',
        'apellido' => 'required|min:2',
        'email' => 'required|email:rfc',
        'avatar' => 'mimes:jpeg,png,jpg',
    ];    
    
    public static $messages = [
        'nombre.required' => 'El campo nombre no puede ir vacío',
        'id_rol.required' => 'El campo rol no puede ir vacío',
        'nombre.min' => 'El mínimo son 2 caracteres',       
        'apellido.required' => 'El campo apellido no puede ir vacío',
        'apellido.min' => 'El mínimo son 2 caracteres',       
        'email.required' => 'El email es no puede ir vacío',       
        'email.email' => 'El formato del email no es correcto',       
        'password.required' => 'La contraseña es obligatoria',       
        'password.min' => 'La contraseña debe tener un mínimo de 7 caracteres',       
        'avatar.mimes' => 'La imagen debe tener una extensión jpg, jpeg o png',       
    ];      
}
