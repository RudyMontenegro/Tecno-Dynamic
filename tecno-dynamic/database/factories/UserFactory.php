<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Cliente::class, function (Faker $faker) {
    return [
        'nombre_contacto' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'nombre_empresa' => $faker->company,
        'nit' => $faker->randomNumber(8, true),
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'web_site' => $faker->url,
    ];
});
