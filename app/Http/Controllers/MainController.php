<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class MainController extends Controller
{
  
    public function index()
    {
        $title = "Home";
        return view('home')->with('title', $title);
    }
    public function services()
    {
        $title = "services";
        return view('services')->with('title', $title);
    }
    public function about()
    {
        $title = "about";
        return view('about')->with('title', $title);
    }
    public function locations()
    {
        $title = "locations";
        return view('locations')->with('title', $title);
    }
    public function quote()
    {
        $title = "quote";
        return view('quote')->with('title', $title);
    }
    public function contact()
    {
        $title = "contact";
        return view('contact')->with('title', $title);
    }
  
}
