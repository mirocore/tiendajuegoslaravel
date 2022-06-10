<?php

use Illuminate\Database\Seeder;

class CategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'id_categoria' => 1,
            'nombre_categoria' => 'Consolas'
        ]);
        DB::table('categorias')->insert([
            'id_categoria' => 2,
            'nombre_categoria' => 'Juegos'
        ]);
        DB::table('categorias')->insert([
            'id_categoria' => 3,
            'nombre_categoria' => 'Accesorios'
        ]);        
    }
}
