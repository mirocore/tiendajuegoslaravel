<?php

use Illuminate\Database\Seeder;

class ConsolasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('consolas')->insert([
            'id_consola' => 1,
            'nombre_consola' => 'PS4',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 2,
            'nombre_consola' => 'PS3',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 3,
            'nombre_consola' => 'Nintendo Switch',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 4,
            'nombre_consola' => 'PC',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 5,
            'nombre_consola' => 'Xbox One',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 6,
            'nombre_consola' => 'Xbox 360',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 7,
            'nombre_consola' => '3DS',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 8,
            'nombre_consola' => 'Wii U',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 9,
            'nombre_consola' => 'PS VITA',
        ]);
        DB::table('consolas')->insert([
            'id_consola' => 10,
            'nombre_consola' => 'Retro',
        ]);
    }
}
