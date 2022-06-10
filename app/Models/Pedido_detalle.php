<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido_detalle extends Model
{
    protected $table = "pedido_detalles";
    protected $primaryKey = "id_pedido_detalle";
    protected $fillable = ['id_pedido', 'id_producto', 'nombre_producto', 'precio_producto', 'cantidad'];
    
    public function pedido()
    {
        return $this->belongsTo(Pedido::class, 'id_pedido', 'id_pedido');
    }
}
