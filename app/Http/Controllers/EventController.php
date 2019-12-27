<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\File;
use Image;


class EventController extends Controller
{
    public function create()
    {
        //
        return view('event.create_event');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'transpotation' => 'required',
            'limitation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'price' => 'required',
            'contact' => 'required',
            'categories_id' => 'required',
            'location' => 'required'
        ]);
        $event = new Event();
        $event->title = $request->title;
        $event->description = $request->description;
        $event->duration = $request->duration;
        $event->include = $request->include;
        $event->location = $request->location;
        $event->limitation = $request->limitation;
        $event->transpotation = $request->transpotation;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->contact = $request->contact;
        $event->price = $request->price;
        $event->categories_id = $request->categories_id;
        $event->user_id=Auth::user()->id;
        $event->save();
        Session::flash('Event','Event send successfully');
        if ($request->hasFile('image_0')){
            for ($i=0;$i<$request->size_images;$i++){
                $image = $request->file("image_$i");
                $extension = $image->getClientOriginalExtension();
                $filename = Auth::user()->name."_$i".time().".".$extension;
                $event->images()->create(['url'=>'storage/events_images/'.$filename]);
                $image=Image::make($image)->fit(500,350)->save(public_path('storage/events_images/'.$filename));
            }
        }
        return response()->json();
    }

    public function index()
    {
        $event = Event::all();
        return view('event.index',compact('event'));

    }

    public function edit($event)
    {
        $event = Event::find($event);
        return view('event.edit',compact('event'));
    }

    public function show($event){
        $event = Event::find($event);
        // dd($event->images);
        return view ('event.show',compact('event'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'title' => 'required',
            'include' => 'required',
            'duration' => 'required',
            'categories_id' => 'required',
            'price' => 'required',
            'limitation' => '',
            'contact' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'transpotation' => 'required',
            'location' => '',
            'description' => ''
        ]);
        $event = Event::find($id);
        $event->update($validate);
        if ($request->hasFile('image_0')){
            $pre_images = Event::find($id)->images;
            if (count($pre_images)>0){
                foreach ($pre_images as $image){
                    Storage::delete(('public\\'.$image->url));
                    $image->delete();
                }
                
            }
            for ($i=0;$i<$request->size_images;$i++){
                $image = $request->file("image_$i");
                $extension = $image->getClientOriginalExtension();
                $filename = Auth::user()->name."_$i".time().".".$extension;
                $event->images()->create(['url'=>'events_images/'.$filename]);
                $image=Image::make($image)->fit(500,350)->save(public_path('storage/events_images/'.$filename));
            }
        }
        Session::flash('edit_event','event Saved Successfully');
        return response()->json();
    }


    public function destroy($id)
    {
        Event::findOrFail($id)->delete();
        return response()->json();

    }
}
