<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('posts.all')->with('title','all plogs')->with('posts',BlogPost::all());
        // return view('posts.all',['title'=>'all plogs','posts'=>BlogPost::where('auther',Auth::id())->get()]);
        return view('posts.all',['title'=>'all plogs','posts'=>BlogPost::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create',['title'=>'create new post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'title'=>'required|min:1|max:50',
            'content'=>'required|min:10|max:5000',
        ]);
        // store
        return $this->show($request,BlogPost::create([
            'title'=> $request->title,
            'content'=> $request->content,
            'auther'=> Auth::id()
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $r,BlogPost $blogPost)
    {
        // return BlogPost::find($r->route()->parameter('id'));
        return view('posts.show',['title'=>'post details'])->with('post',$blogPost)->with('auther',$blogPost->auther===Auth::id()?true:false);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BlogPost $blogPost)
    {
        return view('posts.edit',['title'=>'update post','post'=>$blogPost]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'title'=>'required|min:1|max:50',
            'content'=>'required|min:10|max:5000',
        ]);
        $blogPost->title = $request->title;
        $blogPost->content = $request->content;
        $blogPost->update();
        return redirect(route('postView',['id'=>$blogPost->id]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BlogPost $blogPost)
    {
        $blogPost->delete();
        return redirect(route('postAll'));
    }
    // remove all posts
    public function deleteAll()
    {
        BlogPost::where('auther',Auth::id())->delete();
        return redirect(route('welcome'));
    }
}
