<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // this is one to many relationship
        //1 post has many comments;
        factory(App\Post::class,100)->create()->each(function ($post){
       $post->comments()->save(factory(App\Comment::class)->make());
        });


    }
}
