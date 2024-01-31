<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view("posts.upload", compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        dd('hi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->id ? $post = Post::find($request->id) : $post = Post::find(1);
        if (!$post) {
            return back()->with('success', 'Could not find post with given ID');
        }  
        if (!$request->hasFile('image')) {
            return back()->with('success', 'No image selected!');
        }  
        if($request->hasFile('image') ){
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }
        $posts = Post::all();
        return view("posts.upload", compact('posts'));

    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $media = DB::table('media')->where('id', $id)->delete();        
        return back()->with('success', 'Image deleted Successfully!');
    }
}
