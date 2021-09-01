<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    public function races()
    {
         return $this->hasMany('App\Races')->latest();
    }

    public function championship()
    {
        return $this->belongsTo('App\Race','id');
    }
}
