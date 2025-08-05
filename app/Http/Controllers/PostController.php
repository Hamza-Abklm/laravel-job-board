<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // elequant orm -> get all data
       $data = Post::latest()->paginate(5);
       return view ('post.index',['posts'=>$data,'pageTitle'=>'Blog'] );
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create',['pageTitle'=>'Blog - Create New Post']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {

        $post = new Post();
        $post->title= $request->input('title');
       $post->user_id = auth()->id();
        $post->body= $request->input('body');
        $post->published=$request->has('published');

        $post->save();
        
        return redirect('/blog')->with('success','post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        

    // Paginate comments, latest first
    $comments = $post->comments()->latest()->paginate(10);

    return view('post.show', [
        'post' => $post,
        'comments' => $comments,
        'pageTitle' => $post->title
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
         

        // Gate::authorize('update', $post);

        

        return view('post.edit',['pageTitle'=>'Blog - Edit Post: '.$post->title,'post'=>$post] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, Post $post)
    {
        

        // Gate::authorize('update', $post);

        $post->title= $request->input('title');
        $post->body= $request->input('body');
        $post->published=$request->has('published');

        $post->save();
        
        return redirect('/blog')->with('success','post updated successfully!');
   
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        
        $post->delete();
        return redirect('/blog')->with('success','post deleted successfully!');

    }
}
