<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gem extends Model
{
     public function country()
    {
        return $this->belongsTo('App\Country');
    }
     public function country()
    {
        return $this->belongsTo('App\Country');
    }
    public function mine()
    {
        return $this->belongsTo('App\Mine');
    }
    public function owner()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
