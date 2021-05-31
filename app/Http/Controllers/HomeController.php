<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'Admin'){
            $blogs = Blog::all();
      //      $blogs = Blog::->whereDate('start_Date','>=',date('Y-m-d'))->get();
        }else{
            $blogs = Blog::where('created_By',auth()->id())->get();
//            $blogs = Blog::where('created_By',auth()->id())->whereDate('start_Date','>=',date('Y-m-d'))->get();
        }

        return view('home',compact('blogs'));
    }
}
