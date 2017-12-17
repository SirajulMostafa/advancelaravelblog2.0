<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'email'=>$faker->email,
        'comment'=>$faker->sentence,
        'approved'=>1,
        'post_id' =>App\Post::all()->random()->id,

    ];
});
