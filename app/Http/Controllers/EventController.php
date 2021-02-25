<?php

namespace App\Http\Controllers;

use App\Event;
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

        if (File::exists('upload_events/' . $image->getClientOriginalName())) {
            return back();
        } else {
            $this->addEvents($req, $image, $event = null);
        }

        return redirect()->route('events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
                'image' => $img->getClientOriginalName() ?? null,
                'plan' => request('plan'),
                'description' => request('description'),
                'location' => request('location'),
                'start_date' => request('start_date'),
                'end_date' => request('end_date'),
            ]);

            // move img
            $img->move('upload_events', $img->getClientOriginalName());
        } else {
            File::delete('upload_events/' . $event->image);

            // move img
            $img->move('upload_events', $img->getClientOriginalName());

            $event->update([
                'image' => $img->getClientOriginalName() ?? null,
                'plan' => request('plan'),
                'description' => request('description'),
                'location' => request('location'),
                'start_date' => request('start_date'),
                'end_date' => request('end_date'),
            ]);
        }
    }
}
