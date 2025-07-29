<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Blog created successfully.');
    }


    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        return redirect()->route('admin.dashboard')->with('success', 'Blog updated.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return back()->with('success', 'Blog deleted');
    }
    public function show(Blog $blog)
    {
        $comments = $blog->comments()->with('user')->latest()->get();

        return view('blogs.show', compact('blog', 'comments'));
    }
    public function landing(){
        if(Auth::check()){
            if(auth()->user()->isAdmin){
                return redirect()->route('admin.dashboard');

            }
            return redirect()->route('dashboard');
        }
        $blogs=Blog::latest()->get();
        return view('welcome',compact('blogs'));
    }


}
