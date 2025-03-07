<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    /** @use HasFactory<\Database\Factories\PostTagFactory> */
    use HasFactory;

    public function posts() 
    {
        return $this->belongsToMany(Post::class,'post_post_tag', 'post_tag_id', 'post_id');
    }
}
