<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = ['url'];

    public function event(){
        return $this->morphTo();
    }
}
