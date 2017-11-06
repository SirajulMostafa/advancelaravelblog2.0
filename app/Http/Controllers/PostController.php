<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Post;
// use App\Tag;
// use App\Category;
 use Session;
// use Purifier;
// use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
      // validate the data
     $this->validate($request, array(
             'title'         => 'required|max:255',
            // 'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            // 'category_id'   => 'required|integer',
             'body'          => 'required'
         ));

     // store in the database
     $post = new Post;
     $post->title = $request->title;
     //$post->slug = $request->slug;
    // $post->category_id = $request->category_id;
    // $post->body = Purifier::clean($request->body);
     $post->body =$request->body;

    //  if ($request->hasFile('featured_img')) {
    //    $image = $request->file('featured_img');
    //    $filename = time() . '.' . $image->getClientOriginalExtension();
    //    $location = public_path('images/' . $filename);
    //    Image::make($image)->resize(800, 400)->save($location);
     //
    //    $post->image = $filename;
    //  }
     $post->save();
  //   $post->tags()->sync($request->tags, false);
     Session::flash('success', 'The blog post was successfully save!');
     return redirect()->route('posts.show', $post->id);
    }
    public function show($id)
    {
      $post = Post::find($id);
      //return view('posts.show')->with('post',$post);//1st one is variable and 2nd is option object
      return view('posts.show')->withPost($post);//1st one is variable and 2nd is  object
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
