<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cliente;
use App\Proveedor;
use App\Categoria;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'), // secret
            'cedula' => '12714785',
            'direccion' => '',
            'telefono' => '',
            'nivel_usuario'=> 'admin'
        ]);
        factory(Proveedor::class, 10)->create();
        factory(Categoria::class, 2)->create();
        factory(Cliente::class, 100)->create();
    }
    
}
