<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex( )
    {
      return view('pages.welcome');
      return "hello Index";

    }
    public function getAbout( )
    {
      return view("pages.about");
      return "hello about";

    }
    public function getContact( )
    {
      return view("pages.contact");
      return "hello getContact";

    }
    // public function postContact( )
    // {
    //   return view("");
    //   return "hello post contact";
    //
    // }
}
