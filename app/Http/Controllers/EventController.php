<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $image = $req->file('image');

        $this->addEvents($req, $image, $event = null);

        return redirect()->route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Event $event)
    {
        $image = $req->file('image');

        $this->addEvents($req, $image, $event);

        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        File::delete('upload_events/' . $event->image);

        return back();
    }

    public function addEvents($req, $img, $event)
    {
        if (is_null($event)) {
            Event::create([
                'plan' => $req->plan,
                'image' => isset($img) ? strtotime('now') . '-' . $img->getClientOriginalName() : null,
                'slug' => Str::slug($req->plan),
                'description' => $req->description,
                'location' => $req->location,
                'start_date' => $req->start_date,
                'end_date' => $req->end_date,
            ]);

            // move img
            isset($img) ?
                $img->move('upload_events',  strtotime('now') . '-' . $img->getClientOriginalName())
                :
                '';
        } else {
            File::delete('upload_events/' . $event->image);

            $event->update([
                'plan' => $req->plan,
                'image' => isset($img) ? strtotime('now') . '-' . $img->getClientOriginalName() : null,
                'slug' => Str::slug($req->plan),
                'description' => $req->description,
                'location' => $req->location,
                'start_date' => $req->start_date,
                'end_date' => $req->end_date,
            ]);

            // move img
            isset($img) ?
                $img->move('upload_events',  strtotime('now') . '-' . $img->getClientOriginalName())
                :
                '';
        }
    }
}
