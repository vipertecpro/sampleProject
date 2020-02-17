<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
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

$factory->define(\App\Taxonomy::class, function (Faker $faker) {
    $name = $faker->colorName.Str::random(2);
    $slug = Str::slug($name,'-');
    return [
        'name'      => $name,
        'slug'      => $slug,
        'parent_id' => 0,
        'type'      => $faker->randomElement(['category','tag'])
    ];
});
