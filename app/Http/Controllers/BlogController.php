<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->role == 'Admin'){
            $blogs = Blog::all();
        }else{
            $blogs = Blog::where('created_By',auth()->id())->get();
        }
        return view('blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        $data = $request->all();
        $data['image'] = \Storage::put('/blog',$data['image']);
        $data['active'] = isset($data['active']) ? "1" : "0" ;

        Blog::create([
            'blog_Name' => $data['bname'],
            'blog_Description' => $data['bdesc'],
            'start_Date' => $data['bstart_date'],
            'end_Date' => $data['bend_date'],
            'is_Active' => $data['active'],
            'image' => $data['image'],
            'created_By' => auth()->id(),
        ]);

        return redirect()->route('blogs.index')->with('Blog Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->all();
        $data['image'] = \Storage::put('/blog',$data['image']);
        $data['active'] = isset($data['active']) ? "1" : "0" ;

        Blog::where('id', $blog->id)->update([
            'blog_Name' => $data['bname'],
            'blog_Description' => $data['bdesc'],
            'start_Date' => $data['bstart_date'],
            'end_Date' => $data['bend_date'],
            'is_Active' => $data['active'],
            'image' => $data['image'],
        ]);

        return redirect()->route('blogs.index')->with('Blog Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('Blog Deleted Successfully');
    }
}
