<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\PseudoTypes\True_;

class TagController extends Controller
{
    function index(){
        // elequant orm -> get all data
       $data = Tag::all();
       return view ('tag.index',['tags'=>$data,'pageTitle'=>'Tags'] );
    }


    function create(){
        Tag::create([
            'title'=> 'css',
            
        ]);
        return redirect('/tags');
    }
    function testManyToMany(){
        // $post1 = Post::find(1);
        // $post3 = Post::find(3);

        // $post1->tags()->attach([1,3]);
        // $post3->tags()->attach([1]);
        
        // return response()->json([
        //     'post1'=> $post1->tags,
        //     'post3'=> $post3->tags
        // ]);
        $tag = Tag::find(1);
        $tag->posts()->attach(3);
        return response()->json([
            'tag'=> $tag->title,
            'posts'=> $tag->posts,
        ]);

    }
}
