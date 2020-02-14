<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Event;
use App\Image;
use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    public function homeEvents(){
        $events = Event::take(10)->get();
        foreach ($events as $event){
            $image = Image::where('imageable_id',$event->id)->first();
            $event->image_url = $image->url;
        }

        return response()->json($events);
    }

    public function show($id){
        $event = Event::find($id);
        if (!empty($event)){
            return response()->json($event);
        }
        return response()->json([
            'message' => 'Event could not find'
        ]);
        
    }
}
