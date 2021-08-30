<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    protected $table = "championship";

    public function races()
    {
         return $this->hasMany('App\Races')->latest();
    }
}
