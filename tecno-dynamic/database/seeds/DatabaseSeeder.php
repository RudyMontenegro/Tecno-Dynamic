<?php

use Illuminate\Database\Seeder;
use App\User;
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
        // $this->call(UsersTableSeeder::class);
    }
    
}
