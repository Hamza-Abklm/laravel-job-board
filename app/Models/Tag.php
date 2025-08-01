<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{   use HasFactory;
    use HasUuids;
    protected $primaryKey = "id";
    protected $keyType = 'string'; //UUID
    public $incrementing = false;

    protected $table = "tag";
    protected $fillable = [ 
        "title",
    ];// field that can be updated

    protected $gurded = ["id"]; //cant be updated
    public function posts(){
        return $this->belongsToMany(Post::class);
    }
}
