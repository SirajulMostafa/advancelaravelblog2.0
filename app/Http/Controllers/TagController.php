<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Tag;
class TagController extends Controller
{
  public function __construct() {
       $this->middleware('auth');

   }
   public function index()
     {
         $tags = Tag::all();
         return view('tags.index')->withTags($tags);
     }
     public function store(Request $request)
     {
         $this->validate($request, array('name' => 'required|max:255'));
         $tag = new Tag;
         $tag->name = $request->name;
         $tag->save();
        //if this use for  session we should use Session ; top of the controller
         //Session::flash('success', 'New Tag was successfully created!');

         return redirect()->route('tags.index')
                    ->with('success', 'New Tag was successfully created!');
     }

     public function show($id)
     {
         $tag = Tag::find($id);
         return view('tags.show')->withTag($tag);
     }

     public function edit($id)
     {
         $tag = Tag::find($id);
         return view('tags.edit')->withTag($tag);
     }

     public function update(Request $request, $id)
     {
         $tag = Tag::find($id);
         $this->validate($request, ['name' => 'required|max:255']);

         $tag->name = $request->name;
         $tag->save();
         return redirect()->route('tags.show', $tag->id)->with('success','Succesfully saved new Tag');
     }

     public function destroy($id)
     {
         $tag = Tag::find($id);
         $tag->posts()->detach();
         $tag->delete();
         return redirect()->route('tags.index')->with('success', 'Tag was deleted successfully');
     }
}
