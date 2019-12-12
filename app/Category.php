<?php

namespace App;
use App\Event;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $guarded = [];


    public function event()
    {
        return $this->hasMany('App\Event');
    }
}
