<?php

use Illuminate\Database\Seeder;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marcas')->insert([
            'id_marca'         => 1,
            'nombre_marca'     => 'EA',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 2,
            'nombre_marca'     => 'Bandai Namco',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 3,
            'nombre_marca'     => 'Fortnite',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 4,
            'nombre_marca'     => 'Capcom',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 5,
            'nombre_marca'     => 'Rockstar Games',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 6,
            'nombre_marca'     => 'Warner Bros',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 7,
            'nombre_marca'     => 'Nintendo',
        ]);
        DB::table('marcas')->insert([
            'id_marca'         => 8,
            'nombre_marca'     => 'Sony',
        ]);
    }
}
