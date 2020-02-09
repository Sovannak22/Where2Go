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
        dd($events);
    }
}
