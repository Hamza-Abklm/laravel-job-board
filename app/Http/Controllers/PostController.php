<?php

namespace App\Http\Controllers;

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
       $data = Post::paginate(5);
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
    public function store(Request $request)
    {
        //@TODO this will be completed in the forms section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $post = Post::findOrFail($id);
        return view ('post.show',['post'=>$post,'pageTitle'=> $post->title] );
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         return view('post.edit',['pageTitle'=>'Blog - Edit Post']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       //@TODO this will be completed in the forms section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //@TODO this will be completed in the forms section
    }
}
