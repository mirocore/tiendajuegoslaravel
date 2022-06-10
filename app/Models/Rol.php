<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    protected $primaryKey = "id_rol";
    protected $fillable = ['nombre'];

    const ROL_ADMINISTRADOR = 1;
    const ROL_USUARIO = 2;

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol', 'id_rol');
    }
}
