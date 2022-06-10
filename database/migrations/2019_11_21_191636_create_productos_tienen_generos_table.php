<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTienenGenerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_tienen_generos', function (Blueprint $table) {
            $table->increments('id_productos_tienen_generos');
            
            $table->integer('id_producto')->unsigned();
            $table->integer('id_genero')->unsigned();
            
            $table->foreign('id_producto')->references('id_producto')->on('productos');
            $table->foreign('id_genero')->references('id_genero')->on('generos');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos_tienen_generos');
    }
}
