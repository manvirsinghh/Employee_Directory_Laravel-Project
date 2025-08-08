<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use App\Models\Category;

class EventController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:published,draft',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($validated); // This is the actual save

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }
    public function update(Request $req, Event $event)
    {
        $req->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date_time' => 'required|date',
            'location' => 'required|string',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:published,draft',


        ]);
        $data = $req->only([
            'title',
            'description',
            'date_time',
            'location',
            'category',
            'price',
            'status'
        ]);

        if ($req->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $req->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Event updated successfully!');
    }
    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        $event->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Event deleted successfully!');
    }

    public function index()
    {
        $events = Event::latest()->get();
        $categories = Category::all();
        return view('admin.events.index', compact('events'));
    }
    public function eventsByCategory($id)
    {
        $category = Category::findorFail($id);
        //Get the event related to the category
        $events = Event::where('category_id', $id)->latest()->get();
        return view('events.by-category', compact('events', 'category'));
    }
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }


}
