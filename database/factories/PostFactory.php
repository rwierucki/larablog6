<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

//use App\Model;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->paragraph(5),
        'date' => now(),
        'type' => 'text'
    ];
});

$factory->state(Post::class, 'image', function (Faker $faker) {
    return [

        'content' => null,
        'type' => 'photo',
        'image' => $faker->imageUrl(1200, 800)
    ];
});
