<?php

use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Usuario::create([
            'nombre' => 'Ramiro',
            'apellido' => 'Belcore',
            'email' => 'belcore@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 1,
            'avatar' => 'rambel.jpg'
        ]);
//        DB::table('usuarios_tienen_productos')->insert([
//            'id_usuario' => 1,
//            'id_producto' => 1,
//            'cantidad' => 1,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ]);
//        DB::table('usuarios_tienen_productos')->insert([
//            'id_usuario' => 1,
//            'id_producto' => 2,
//            'cantidad' => 2,
//            'created_at' => date('Y-m-d H:i:s'),
//            'updated_at' => date('Y-m-d H:i:s'),
//        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Francisco',
            'apellido' => 'Riado',
            'email' => 'panchoriado@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 1,
            'avatar' => 'pancho.jpg'
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Gustavo',
            'apellido' => 'Tijón',
            'email' => 'tabotijon@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 1,
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Juan Román',
            'apellido' => 'Riquelme',
            'email' => 'riquelmeestafeliz@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 2,
            'avatar' => 'roman.jpg'
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Ariel',
            'apellido' => 'Ortega',
            'email' => 'burritoortega@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 2,
            'avatar' => 'ortega.jpg'
        ]);
        \App\Models\Usuario::create([
            'nombre' => 'Juan Sebastían',
            'apellido' => 'Verón',
            'email' => 'brujita@gmail.com',
            'password' => Hash::make('gameover'),
            'id_rol' => 2,
            'avatar' => 'veron.jpg'
        ]);
    }
}
