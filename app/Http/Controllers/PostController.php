<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

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
        $post->author= $request->input('author');
        $post->body= $request->input('body');
        $post->published=$request->has('published');

        $post->save();
        
        return redirect('/blog')->with('success','post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

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
    public function edit(string $id)
    {
        $post = Post::findOrFail( $id );  
        return view('post.edit',['pageTitle'=>'Blog - Edit Post: '.$post->title,'post'=>$post] );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail( $id );
        $post->title= $request->input('title');
        $post->author= $request->input('author');
        $post->body= $request->input('body');
        $post->published=$request->has('published');

        $post->save();
        
        return redirect('/blog')->with('success','post updated successfully!');
   
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail( $id );
        $post->delete();
        return redirect('/blog')->with('success','post deleted successfully!');

    }
}
