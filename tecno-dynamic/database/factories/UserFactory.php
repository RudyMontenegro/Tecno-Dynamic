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
*/$factory->define(App\Proveedor::class, function (Faker $faker) {
    return [
        'nit' => $faker->randomNumber(8, true),
        'nombre_empresa' => $faker->company,
        'nombre_contacto' => $faker->name,
        'direccion' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'web_site' => $faker->url,
        'telefono' => $faker->phoneNumber,
        'categoria'=>$faker->randomElement(['intangible','tangible'])
    ];
});
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
$factory->define(App\Categoria::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->randomElement(['intangible','tangible']),
        'descripcion' =>$faker-> paragraph($nbSentences = 3, $variableNbSentences = true)
    ];
});
//$factory->define(App\Productos::class, function (Faker $faker) {
  //  return [
       // 'codigo'=>$faker->randomElement(['intangible','tangible']),
        //'descripcion' =>$faker-> paragraph($nbSentences = 3, $variableNbSentences = true)
  //  ];
//});

