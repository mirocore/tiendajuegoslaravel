<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdPedidoColumnToPedidoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedido_detalles', function (Blueprint $table) {
            $table->unsignedInteger('id_pedido')->after('id_pedido_detalle');

            $table->foreign('id_pedido')->references('id_pedido')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedido_detalles', function (Blueprint $table) {
            $table->dropForeign(['id_pedido']);
            $table->dropColumn('id_pedido');
        });
    }
}
