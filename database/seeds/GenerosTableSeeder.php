<?php

use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('generos')->insert([
            'id_genero'         => 1,
            'nombre_genero'     => 'Acción',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 2,
            'nombre_genero'     => 'Aventuras',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 3,
            'nombre_genero'     => 'Conducción',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 4,
            'nombre_genero'     => 'Deportes',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 5,
            'nombre_genero'     => 'Estrategia',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 6,
            'nombre_genero'     => 'Rol',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 7,
            'nombre_genero'     => 'Simulador',
        ]);
        DB::table('generos')->insert([
            'id_genero'         => 8,
            'nombre_genero'     => 'Lucha',
        ]);        
    }
}
