<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Traits\NextAndPreviousEvents;
use Spatie\Tags\HasTags;

class Event extends Model
{
    use NextAndPreviousEvents, HasTags;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'updated_at',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public function getAllEvents()
    {
        $events = Event::all();
        return ($events);
    }

    public function showEvent($eventName)
    {
        $eventName = str_replace('_', ' ', $eventName);

        $event = Event::where('name', $eventName)->first();

        $nextEvent = $this->nextEvent($event->id);

        $previousEvent = $this->previousEvent($event->id);


     return collect( [
        'event' => $event,
        'nextEvent' => $nextEvent,
        'previousEvent' => $previousEvent]);
    }
}
