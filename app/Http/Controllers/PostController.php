<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use Spatie\Tags\Tag;


class PostController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->post = new Post();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('type', 'post')->get();
        return view('posts.index', [
            'posts' => $posts]);

    }
    public function showall()
    {
        $posts = Post::all();
        return view('posts.showall', [
            'posts' => $posts]);

    }
   

    /**
     * Display the specified resource by returning a Collection from the Model.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($postName)
    {   

        $post = $this->post->showPost($postName)['post']; 
        $nextPost = $this->post->showPost($postName)['nextPost']; 
        $previousPost = $this->post->showPost($postName)['previousPost']; 

        return view('posts.show', [
            'post' => $post,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all()->pluck('name');
        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

                
            if($request->tags) {
                $request->tags = str_replace(' ', '', $request->tags);
                $tags = explode(',', $request->tags);
            }
            $post = new Post();
            if($request->hasFile('image') ){
                $post->addMedia($request->file('image'))->toMediaCollection('images');
            }
            $post->owner_id = auth()->id();
            $post->type = request()->type;
            $post->name = request()->name;
            $post->description = request()->description;
            $post->url ? $post->url = request()->url : $post->url = '';
            $post->cost ? $post->cost = request()->cost : $post->cost = 20;
            $post->start_date ? $post->start_date = request()->start_date : $post->start_date = Carbon::now(); 
            $post->save(); 
            if($request->tags) {$post->syncTags($tags);}
        


        return redirect('/posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $tags = Tag::all()->pluck('name');
        return view('posts.edit', [
            'post' => $post,
            'tags' => $tags
    ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $post = Post::find($id);
        if($request->hasFile('image') ){
            $post->addMedia($request->file('image'))->toMediaCollection('images');
        }
        if($request->tags) {
        $request->tags = str_replace(' ', '', $request->tags);
        $tags = explode(',', $request->tags);
        }

        if($request->tags) {$post->syncTags($tags);}
        $post->name = request()->name;
        $post->type = request()->type;
        $post->description = request()->description;
        $post->url ? $post->url = request()->url : $post->url = ""; 
        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id)->delete();

        return redirect('/posts');
    }
}
