<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
class EventsController extends Controller
{
    //
    public function index()
    {
        $events = Event::get();
        $categories = Category::all();
        return view('events.index', compact('events'));
    }
}
