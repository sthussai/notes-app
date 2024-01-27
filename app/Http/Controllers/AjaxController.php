<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class AjaxController extends Controller
{
    public function index()
    {
        $msg = 'This is a simple message.';
        $btn = 'New Button.';
        return response()->json([
            'msg' => $msg,
            'btn' => $btn,
        ], 200);
    }

    public function search(Request $request)
    {
        if ($request->ajax()) {
            if($request->search != ""){ //if search query is not empty string, fire the search.
                $output = '';
                $events = DB::table('events')
                ->where('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('description', 'LIKE', '%' . $request->search . '%')
                ->get();
    
                $total_row = $events->count();
                dump('Events Found: '.$total_row);
        if($total_row == 0){
            $output = 'No Events Found<br><br><a href="/events" class=" w3-blue-grey w3-button">View All Events</a>';
        }
                else {
                    foreach ($events as $event) {
                        $event->link = str_replace(' ', '_', $event->name);
                        $output .= '<br><a target="_blank" href="/events/' . $event->link . '" class="w3-row-padding w3-content"
                        style="solid 2px green">
                        <div class="w3-button w3-center w3-white w3-padding w3-col s12 ">
                            <div class="w3-mobile w3-col l3 m4 s12" style="solid 2px red">
                            <img class="w3-image" src=' . $event->url . ' style="height:80px; width:120px;solid 2px red">
                            </div>
                            <div class="w3-mobile w3-col l9 m6 s12" style="margin-top:0px; solid 2px red;">
                            <h5><b>' . $event->name . '</b><h5>
                            <h5>' . $event->description . '<h5>
                            </div>
                        </div>

                      </a>';
                    }
              }
    
            
    
                return Response($output);
            }
    

            }
    }
}
