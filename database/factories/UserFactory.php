<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuarios;
use App\Productos;
use App\Estados;
use App\Municipios;
use App\Almacen;
use App\Pago;
use App\Tickets;
use Illuminate\Support\Str;


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

$factory->define(Usuarios::class, function (Faker\Generator $faker) {
    return [
        'activo' => $faker->word,
        'nombre' => $faker->word,
        'apellidop' => $faker->word,
        'apellidom' => $faker->word,
        'genero' => $faker->word,
        'telefono' => $faker->word,
        'fn' => $faker->word,
        'tipo_u' => $faker->word,
        'archivo' => $faker->word,
        'correo' => $faker->word,
        'password' => $faker->word,
        'direccion' => $faker->word,
        'id_estado' => $faker->numberBetween(1, 100),
        'id_municipio' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Productos::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word,
        'categoria' => $faker->word,
        'precio' => $faker->word,
        'color' => $faker->word,
        'tamaño' => $faker->word
    ];
});


$factory->define(Estados::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word
    ];
});

$factory->define(Municipios::class, function (Faker\Generator $faker) {
    return [
        'nombre' => $faker->word
    ];
});

$factory->define(Almacen::class, function (Faker\Generator $faker) {
    return [
        'estado_p' => $faker->word,
        'cantidad_p' => $faker->numberBetween(1, 1000),
        'fecha_ing' => $faker->word,
        'fecha_sal' => $faker->word,
        'id_producto' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Pago::class, function (Faker\Generator $faker) {
    return [
        'tipo_p' => $faker->word,
        'num_t' => $faker->numberBetween(1, 100),
        'nip_t' => $faker->word,
        'monto_p' => $faker->numberBetween(1, 10000),
        'id_usuario' => $faker->numberBetween(1, 100)
    ];
});

$factory->define(Tickets::class, function (Faker\Generator $faker) {
    return [
        'id_producto' => $faker->numberBetween(1, 100),
        'id_pago' => $faker->numberBetween(1, 100),
        'fechainicial' => $faker->word,
        'fechaentrega' => $faker->word,
        'total' => $faker->numberBetween(1, 10000)
    ];
});
