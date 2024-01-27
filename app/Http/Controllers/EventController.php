<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Event;
use Spatie\Tags\Tag;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->event = new Event();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = $this->event->getAllEvents();
        return view('events.index', [
            'events' => $events]);

    }
   

    /**
     * Display the specified resource by returning a Collection from the Model.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventName)
    {   

        $event = $this->event->showEvent($eventName)['event']; 
        $nextEvent = $this->event->showEvent($eventName)['nextEvent']; 
        $previousEvent = $this->event->showEvent($eventName)['previousEvent']; 

        return view('events.show', [
            'event' => $event,
            'nextEvent' => $nextEvent,
            'previousEvent' => $previousEvent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $tags = Tag::all()->pluck('name');
        return view('events.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if ($request->type=='event'){
                $request->tags = str_replace(' ', '', $request->tags);
            $tags = explode(',', $request->tags);
            $event = new Event();

            $event->owner_id = auth()->id();
            $event->type = request()->type;
            $event->name = request()->name;
            $event->description = request()->description;
            $event->url ? $event->url = request()->url : $event->url = '';
            $event->cost ? $event->cost = request()->cost : $event->cost = 20;
            $event->start_date ? $event->start_date = request()->start_date : $event->start_date = Carbon::now(); 
            $event->save(); 
            $event->syncTags($tags);
        }


        return redirect('/events');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $tags = Tag::all()->pluck('name');
        return view('events.edit', [
            'event' => $event,
            'tags' => $tags
    ]);
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
        $request->tags = str_replace(' ', '', $request->tags);
        $tags = explode(',', $request->tags);
        $event = Event::find($id);
        $event->syncTags($tags);
        $event->name = request()->name;
        $event->description = request()->description;
        $event->url ? $event->url = request()->url : $event->url = ""; 
        $event->save();

        return redirect('/events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id)->delete();

        return redirect('/events');
    }
}
