<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $blog->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Comment added!');
    }
}
