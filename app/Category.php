<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{   // line ekhane likhar karon holo post and category
   // 2ta table nika kaz hosse tai menually table name bola aglo
    protected $table ='categories';
    public function posts()
    {
      // that means hey    one-many
      //one category has many Post// onek gulo post ase ek e catgory er under e
       return $this->hasMany('App\Post')  ;
    }
}
