<?php

use Faker\Generator as Faker;

//NOTE:we should bear in mind  before  run this class we have to insuring that  user and category have some
//data in database table bcz we need some category id and user id
//
$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
       // 'title' => $faker->sentence,
        'body' => $faker->paragraph(random_int(3,5)),
        'slug' =>$faker->slug,
        'image' =>$faker->image(),
        'category_id' =>App\Category::all()->random()->id,
        'user_id' =>App\User::all()->random()->id,
       // 'remember_token' => str_random(10),
    ];
});
