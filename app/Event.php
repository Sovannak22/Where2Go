<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Event extends Model
{
    use Notifiable, HasApiTokens;
    //
    protected $guarded = [];

    protected $fillable = [
        'tile', 'duration', 'start_date','end_date','contact','limitation','description','transpotation','price'
    ];


    public function categories()
    {
        return $this->belongsTo('App\Category');
    }

}
