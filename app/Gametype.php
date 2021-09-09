<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gametype extends Model
{
    public function teams()
    {
        return $this->belongsTo('App\Team','team_id');
    }
}
