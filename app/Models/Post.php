<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = 'string'; //UUID
    public $incrementing = false;
    protected $table = "post";
    protected $fillable = [ 
        "title",
        "author", 
        "body",
        "published",
        "user_id"

    ];// field that can be updated

    protected $guarded = ["id"]; //cant be updated

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}
