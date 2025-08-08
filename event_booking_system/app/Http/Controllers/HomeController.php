<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Event;
class HomeController extends Controller
{
    public function index(){
        $events=Event::with('category')->latest()->get();
        $categories=Category::all();
        return view('home',compact('events','categories'));
    }
    
}
