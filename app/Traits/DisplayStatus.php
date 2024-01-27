<?php

namespace App\Traits;

use Illuminate\Http\Request;
use App\EventRegister;
use App\ProgramRegister;

trait DisplayStatus
{
    public function getEventRegistrationStatus()
    {
        $eventregisters = EventRegister::where('owner_id', auth()->id())->get();
        foreach ($eventregisters as $eventregister) {
            if ($eventregister->status == 'New Registration Created') {
                $eventregister->status = "<span class='w3-small w3-pale-red w3-round-large w3-padding'>" . $eventregister->status . '</span>';
            } elseif ($eventregister->status == 'Cancelled') {
                $eventregister->status = "<span id='register' class='w3-small w3-grey w3-round-large w3-padding'>" . $eventregister->status . '</span>';
            } elseif ($eventregister->status == 'Confirmed: will pay in person') {
                $eventregister->status = "<span id='register' class='w3-small w3-blue w3-round-large w3-padding'>" . $eventregister->status . '</span>';
            } elseif ($eventregister->status == 'Paid Online') {
                $eventregister->status = "<span id='register' class='w3-green w3-round-large w3-padding'>" . $eventregister->status . '</span>';
            } else {
                $eventregister->status = "<span class='w3-small w3-margin-bottom w3-light-green w3-round-large w3-padding'>" . $eventregister->status . '</span>';
            }
        }
        return $eventregisters;
    }

    public function getProgramRegistrationStatus()
    {
        $programregisters = ProgramRegister::where('owner_id', auth()->id())->get();
        foreach ($programregisters as $programregister) {
            if ($programregister->status == 'New Registration Created') {
                $programregister->status = "<span class='w3-small w3-pale-red w3-round-large w3-padding'>" . $programregister->status . '</span>';
            } elseif ($programregister->status == 'Cancelled') {
                $programregister->status = "<span id='register' class='w3-small w3-grey w3-round-large w3-padding'>" . $programregister->status . '</span>';
            } elseif ($programregister->status == 'Confirmed: will pay in person') {
                $programregister->status = "<span id='register' class='w3-small w3-blue w3-round-large w3-padding'>" . $programregister->status . '</span>';
            } elseif ($programregister->status == 'Paid Online') {
                $programregister->status = "<span id='register' class='w3-green w3-round-large w3-padding'>" . $programregister->status . '</span>';
            } else {
                $programregister->status = "<span class='w3-small w3-margin-bottom w3-light-green w3-round-large w3-padding'>" . $programregister->status . '</span>';
            }
        }
        return $programregisters;
    }

    public function styleStatus($registration)
    {
        $online = null;
        $showform = null;
        $showDeleteForm = true;

        if ($registration->status == 'New Registration Created') {
            $showform = true;
            $registration->status = "<span class='w3-pale-red w3-round-large w3-padding'>" . $registration->status . '</span>';
        } elseif ($registration->status == 'Cancelled') {
            $showform = true;
            $registration->status = "<span id='register' class='w3-grey w3-round-large w3-padding'>" . $registration->status . '</span>';
        } elseif ($registration->status == 'Confirmed: will pay in person') {
            $showform = true;
            $registration->status = "<span id='register' class='w3-blue w3-round-large w3-padding'>" . $registration->status . '</span>';
        } elseif ($registration->status == 'Paid Online') {
            $showform = false;
            $online = false;
            $showDeleteForm = false;
            $registration->status = "<span id='register' class='w3-green w3-round-large w3-padding'>" . $registration->status . '</span>';
        } else {
            $showform = true;
            $online = true;
            $registration->status = "<span id='register' class='w3-light-green w3-round-large w3-padding'>" . $registration->status . '</span>';
        }
        $registration = collect(['registration' => $registration,
            'showform' => $showform,
            'online' => $online,
            'showDeleteForm' => $showDeleteForm,
        ]);
        return($registration);
    }

    /*     Check that the event status in the request is one of the valid acceptable options. */
    public function validStatus($request)
    {
        if ($request->status === 'New Registration Created' || $request->status === 'Confirmed: will pay in person' ||
    $request->status === 'Cancelled' || $request->status === 'Paid Online' ||
    $request->status === 'Confirmed: Pending payment online') {
            return true;
        }
    }
}
