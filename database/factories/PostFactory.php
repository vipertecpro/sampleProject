<?php

/** @var Factory $factory */

use App\Post;
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

$factory->define(Post::class, function (Faker $faker) {
    $title = $faker->sentence(10);
    $slug = Str::slug($title);
    return [
        'user_id'       => User::get()->random()->id,
        'parent_id'     => 0,
        'title'         => $title,
        'slug'          => $slug,
        'summary'       => $faker->sentence(50),
        'content'       => $faker->sentence(500),
        'type'          => $faker->randomElement(['blog','news','page','product']),
        'status'        => $faker->randomElement(['published','draft']),
    ];
});
