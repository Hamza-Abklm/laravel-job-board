<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // elequant orm -> get all data
        $comments = Comment::paginate();
        return view('comment.index', [
            'comments' => $comments,
             'pageTitle' => 'Comments'
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comment.create', [
             'pageTitle' => 'Comments - Create New Comment'
            ]);
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
        $comment = Comment::find($id);
        return view ('comment.show',['comment'=>$comment,'pageTitle'=> $comment->title] );
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        return view ('comment.edit',['comment'=>$comment,'pageTitle'=> $comment->title] );
   
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
