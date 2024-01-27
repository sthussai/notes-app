<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\EventRegister;
use App\Models\Event;

trait NextAndPreviousEvents
{
    public function nextEvent($eventId)
    {
        $nextEvent = Event::where('id', $eventId + 1)->first();
        if ($nextEvent) {
            $nextEvent = $nextEvent->name;
        } else {
            $nextEvent = null;
        }
        return($nextEvent);
    }

    public function previousEvent($eventId)
    {
        $previousEvent = Event::where('id', $eventId - 1)->first();
        if ($previousEvent) {
            $previousEvent = $previousEvent->name;
        } else {
            $previousEvent = null;
        }
        return($previousEvent);
    }
}
