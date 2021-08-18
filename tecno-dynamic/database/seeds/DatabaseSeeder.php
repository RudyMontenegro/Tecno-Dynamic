<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Cliente;
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
        //factory(Cliente::class, 50)->create();
    }
    
}
