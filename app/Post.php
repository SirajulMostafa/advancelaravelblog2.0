<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  public function category()
  {//here funtion name is singular
    // but posts was written plural
    //1 category have many post
    return $this->belongsTo('App\Category');
  }
  //many to many relationship

  public function tags()
  {
    return $this->belongsToMany('App\Tag');
  }

  public function comments()
  {
    return $this->hasMany('App\Comment');
  }

}
