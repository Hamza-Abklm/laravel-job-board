<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CommentController extends Controller
{
    function index(){
        // elequant orm -> get all data
       $data = Comment::all();
       return view ('comment.index',['comments'=>$data,'pageTitle'=>'Blog'] );
    }



    function create(){
        Comment::create([
            
            'author'=> 'hamza',
            'content'=>'this is another comment',
            'post_id'=> '2',
        ]);
        return redirect('/comments');
    }
}
