<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use Illuminate\Support\Facades\Session;
use Auth;

class feedbackController extends Controller
{
    public function create()
    {
        //
        return view('feedback.create');
    }
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $feedback = new Feedback();
        $feedback->title = $request->title;
        $feedback->description = $request->description;
        $feedback->user_id=Auth::user()->id;
        $feedback->save();
        Session::flash('Feedback','Feedback send successfully');
        return back();
    }

}
