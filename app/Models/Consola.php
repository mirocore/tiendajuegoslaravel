<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consola extends Model
{
    protected $table = "consolas";
    
    protected $primaryKey = "id_consola";
    
    protected $fillable = ['nombre_consola'];
}
