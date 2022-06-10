<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";
    protected $primaryKey = "id_pedido";
    protected $fillable = ['fecha_pedido', 'id_usuario' , 'precio_total'];
    

}
