<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Circuit extends Model
{
    public function circuits()
    {
        return $this->belongsTo('App\Circuit');
    }

}
