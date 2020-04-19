<?php

/** @var Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

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

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'user_id'               => \App\User::all()->random()->id,
        'product_sku'           => random_int(9999999,99999999),
        'product_name'          => $faker->sentence(10),
        'product_short_desc'    => $faker->sentence(100),
        'product_long_desc'     => $faker->sentence(1000),
        'product_price'         => random_int(9999,999999),
        'product_in_stock'      => $faker->randomElement(['yes','no']),
    ];
});
