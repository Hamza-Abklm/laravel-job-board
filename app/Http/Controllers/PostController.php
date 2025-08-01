<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class PostController extends Controller
{
    function index(){
        // elequant orm -> get all data
       $data = Post::paginate(5);
       return view ('post.index',['posts'=>$data,'pageTitle'=>'Blog'] );
    }

    function show($id){
        $post = Post::findOrFail($id);
        return view ('post.show',['post'=>$post,'pageTitle'=> $post->title] );
    }

    function create(){
        // Post::create([
        //     'title'=> 'my find unique content',
        //     'body' => 'this is to test find',
        //     'author'=> 'hamza',
        //     'published'=> true,
        // ]);
        Post::factory(count: 1000)->create();


        return redirect('/blog');
    }
    function delete(){
        Post::destroy(2);
    }
}
