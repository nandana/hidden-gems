<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mine extends Model
{
    public function gems()
    {
        return $this->hasMany('App\Gem');
    }
}
