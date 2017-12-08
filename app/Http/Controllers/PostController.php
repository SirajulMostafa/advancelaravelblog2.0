<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post ;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Image;
use Storage;
use Auth;
class PostController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index()
    { 
        //create a variable and store all the blog post in it from the database
        //$post = Post::all();
         $id =Auth::id();
         // dd($id);
        $post =Post::orderBy('id','desc')->where('user_id',$id)->Paginate(5);
        return view('posts.index')->withPosts($post);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }
    public function store(Request $request)
    {
      // in laravel 5.5 validation work more essy way
      // now validate is under request object
      // $request->validate([
      //   'title'         => 'required|max:255',
      // ]);
      //dd($request);
      // validate the data
     $this->validate($request, array(
             'title'         => 'required|max:255',
             'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
             'category_id'   => 'required|integer',
             'body'          => 'required',
             'featured_image'          => 'sometimes|image'
         ));

     // store in the database
       $post = new Post;
       $post->title = $request->input('title');
       $post->slug = $request->slug;
       $post->user_id = $request->input('user_id',0);
       $post->category_id = $request->category_id;
       $post->body = Purifier::clean($request->body);

     if ($request->hasFile('featured_img')) {
       $image = $request->file('featured_img');
       $filename = time() . '.' . $image->getClientOriginalExtension();
       $location = public_path('images/' . $filename);
       Image::make($image)->resize(800, 400)->save($location);

       $post->image = $filename;
     }
     $post->save();
     //posts associate with tags
     $post->tags()->sync($request->tags, false);
     Session::flash('success', 'The blog post was successfully save!');
     return redirect()->route('posts.show', $post->id);
    }
    public function show($id)
    {
      $post = Post::findOrFail($id);
        //die($post);
        $post_user_id = $post['user_id'];
        if ($this->permisstion_for_access_post($post_user_id)!=true){
           return redirect('/home')->with('status-error','sorry you have no access for this session');
        }
       // dd(!$this->permisstion_for_access_post($post_user_id));


        //dd($post_user_id);

      //return view('posts.show')->with('post',$post);//1st one is variable and 2nd is option object
      return view('posts.show')->withPost($post);//1st one is variable and 2nd is  object
    }

    public function edit($id)
    {
              //Basically  show a edit.blade.php where use get request ,get database
              // $post = Post::findOrFail($id);
              // //return view('posts.show')->with('post',$post);//1st one is variable and 2nd is option object
              // return view('posts.edit')->withPost($post);//1st one is variable and 2nd is  object
              // find the post in the database and save as a var
               $post = Post::findOrFail($id);
               $post_user_id = $post['user_id'];
                if ($this->is_permisstion_for_access_post($post_user_id)!=true){
                  return redirect('/home')->with('status-error','sorry you  can not edit this post, because you are nto author for this post');
                 }
               $categories = Category::all();
               $categories = $categories->pluck('name','id')->all();
              //  $cats = array();
              //  foreach ($categories as $category) {
              //   $cats[$category->id] = $category->name;
              //  }
               $tags = Tag::all();
              // $tags2->pluck('tag_id')->all();
               $tags=$tags->pluck('name','id')->all();
               //this for each also work
              //  $tags2 = array();
              //  foreach ($tags as $tag) {
              //      $tags2[$tag->id] = $tag->name;
              //  }

               return view('posts.edit')->withPost($post)
                      ->withCategories($categories)
                      ->withTags($tags);

    }

    public function update(Request $request, $id)
    {
      // validate the data
        $post = Post::findOrFail($id);
        $post_user_id = $post['user_id'];
        if ($this->is_permisstion_for_access_post($post_user_id)!=true){
            return redirect('/home')->with('status-error','sorry you  can not edit this post, because you are not author for this post');
        }
      //when input slug is same than this field need not update
      //unique field is not work if validation check withot change field
      if ($request->input('slug')==$post->slug) {
          $this->validate($request, array(
              'title'         => 'required|max:255',
              'body'          => 'required',
          ));
      }
      //else if bad diy
      //   'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
      //work same
      //if change slug field than validation check
      else {
         $this->validate($request, array(
          'title'         => 'required|max:255',
          'slug'          => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
          'category_id'   => 'required|integer',
          'body'          => 'required',
          'featured_image'=>'image'
        ));
      }

     // store in the database
     //check is this id is validate or exist in database ?
  //   $post = Post::findOrFail($id);
     $post->title = $request->title;
     $post->slug = $request->slug;
     $post->category_id = $request->category_id;
     $post->body = Purifier::clean($request->body);
     if ($request->hasFile('featured_image')) {
       $image = $request->file('featured_image');
       $filename = time() . '.' . $image->getClientOriginalExtension();
       $location = public_path('images/' . $filename);
       Image::make($image)->resize(800, 400)->save($location);
       $oldFilename = $post->image;
       //update the databse
       $post->image = $filename;
       //Delete the old photo
       Storage::delete($oldFilename);
     }
    //dd($request);
     $post->save();
     //blank check sync expect an arry
     if (isset($request->tags)) {

       $post->tags()->sync($request->tags, false);
       $post->tags()->sync($request->tags);
     }else {
        $post->tags()->sync(array());//pass blank array for delete all tg
     }
     //Session::flash('success', 'The blog post was successfully Updated!');
    // return redirect()->route('posts.show', $post->id);
    return redirect()->route('posts.show', $post->id)
    ->with('success','The blog post was successfully Updated!');
    }
    public function destroy($id)
    {
      $post = Post::find($id);
      $post->tags()->detach();
      $post->delete();
    //  Session::flash('success', 'The post was successfully deleted.');
      return redirect()->route('posts.index')
      ->with('success','The post was successfully deleted.');
    }

/*check the user's id == posts's user_id*/
public function is_permisstion_for_access_post($id)
{    $post_user_id= $id;
    //dd($current_user_id)  ;
    if ($post_user_id==Auth::id()){
        return true;
    }
    return false;

}

}
