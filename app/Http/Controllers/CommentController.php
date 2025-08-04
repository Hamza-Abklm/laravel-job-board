<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // elequant orm -> get all data
        return redirect('/blog');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect('/blog');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $post = Post::findOrFail( $request->input('post_id') );

        $comment = new Comment();
        $comment->author = $request->input('author');
        $comment->content = $request->input('content');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$post->id}")->with('success','post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect('/blog');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //todo
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
