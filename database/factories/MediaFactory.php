<?php

/** @var Factory $factory */

use App\Media;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Facades\Storage;

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

$factory->define(Media::class, function (Faker $faker) {
    return [
        'user_id'   => User::get()->random()->id,
        'path'      => 'media/images/test1.jpg',
        'file_type' => 'jpg',
        'file_size' => '100kb',
    ];
});
