<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tag";
    protected $fillable = [ 
        "title",
    ];// field that can be updated

    protected $gurded = ["id"]; //cant be updated
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
