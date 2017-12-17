<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{


  public function getIndex() {
     $posts = Post::paginate(10);
    return view('blogs.index')->withPosts($posts);
}

  public function getSingle($slug) {
    // fetch from the DB based on slug
    $post = Post::where('slug', '=', $slug)->first();
    // return the view and pass in the post object
    return view('blogs.single')->withPost($post);
  }
  // public function getSingle($slug)
  // {
  //   //  $post = Post::findOrFail($slug);
  //   //  $post = Post::where('slug','=',$slug)->first();//ok work
  //   $post = Post::where('slug',$slug)->first();//first means prothom / part
  //   return view('blogs.single')->withPost($post);
  //   //  return $slug;
  // }
}
