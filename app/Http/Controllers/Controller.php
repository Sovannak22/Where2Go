<?php

namespace App\Http\Controllers;

use App\Category;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $data['category'] = Category::all()->count();
        $data['user'] = User::all()->count();
        return view('dashboard')->with($data);
    }
}
