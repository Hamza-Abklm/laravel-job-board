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
       return view ('comment.index',['comments'=>$data,'pageTitle'=>'Comments'] );
    }



    function create(){
        
        Comment::factory(5)->create();
            
        
        return redirect('/comments');
    }
}
