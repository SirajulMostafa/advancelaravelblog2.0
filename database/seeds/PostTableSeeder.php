<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        // factory(App\Post::class,100)->create();
      //        for pivot table post_tag  do some logical operation
        //many to many relationship {"post_tag"}
       // before do this first need add some tag
        factory(App\Post::class,100)->create()->each(function ($post){
            $boolean = random_int(0,1);
            $ids = range(1,5); //cz we considering that already insert 10  tag id=1-10
            shuffle($ids);
            if ($boolean){
                $sliced =array_slice($ids,0,3);//every post has define by the last param  three/2/1 tag
                $post->tags()->attach($sliced);
            }
        });
    }
}
