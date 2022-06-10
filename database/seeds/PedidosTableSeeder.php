<?php

use Illuminate\Database\Seeder;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'id_pedido' => 1,
            'id_usuario' => 1,
            'precio_total' => 19800,
            'fecha_pedido' => date("Y-m-d H:i:s"),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pedido_detalles')->insert([
            'id_pedido_detalle' => 1,
            'id_pedido' => 1,
            'nombre_producto' => 'Fifa 20',
            'precio_producto' => 5800,
            'cantidad' => 1,
            'id_producto' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('pedido_detalles')->insert([
            'id_pedido_detalle' => 2,
            'id_pedido' => 1,
            'nombre_producto' => 'One Punch Man: A Hero nobody knows',
            'precio_producto' => 7000,
            'id_producto' => 1,
            'cantidad' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
