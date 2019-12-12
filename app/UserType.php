<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //
    protected $guarded = [];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
