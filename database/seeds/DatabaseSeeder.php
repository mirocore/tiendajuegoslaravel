<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CategoriasTableSeeder::class);
        $this->call(ConsolasTableSeeder::class);
        $this->call(MarcasTableSeeder::class);
        $this->call(GenerosTableSeeder::class);
        $this->call(ProductosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UsuariosTableSeeder::class);
        $this->call(PedidosTableSeeder::class);
    }
}
