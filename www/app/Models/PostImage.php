<?php


// app/Models/PostImage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $fillable = ['post_id', 'path', 'is_thumbnail'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    
}