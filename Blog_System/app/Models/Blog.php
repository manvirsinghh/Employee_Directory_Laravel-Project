<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    protected $fillable = ['title', 'content', 'image', 'user_id'];
    // Blog.php
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
