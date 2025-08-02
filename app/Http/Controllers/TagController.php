<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
           // elequant orm -> get all data
       $data = Tag::paginate();
       return view ('tag.index',['tags'=>$data,'pageTitle'=>'Tags'] );
   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('tag.craete',['pageTitle'=>'Tags - Create New Tag']);
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
         $tag = Tag::find($id);
        return view ('tag.show',['tag'=>$tag,'pageTitle'=> $tag->title] );
   
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tag = Tag::find($id);
        return view ('tag.edit',['tag'=>$tag,'pageTitle'=> $tag->title] );
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
