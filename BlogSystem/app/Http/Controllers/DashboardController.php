<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('blogs'));
    }
}

