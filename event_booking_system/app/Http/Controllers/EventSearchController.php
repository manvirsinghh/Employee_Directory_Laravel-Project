<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;

class EventSearchController extends Controller
{
    public function search(Request $request)
    {

        $search = $request->input('search');

        $events = Event::with('category')
            ->where('title', 'like', "%{$search}%")
            ->orWhere('location', 'like', "%{$search}%")
            ->orWhereHas('category', function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->get();

        return view('search-results', compact('events', 'search'));
    }
  

}
