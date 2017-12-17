<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserPostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index($userid)
    {
      //  $posts = User::find($userid)->posts;
        $posts = User::findOrFail($userid)->posts()->paginate(10);
      // return $posts;
        return view('userposts.index',compact('posts'));
    }
}
