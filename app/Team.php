<?php

namespace App;
use App\Gametype;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function gametypes(){
        return $this->belongsTo('App\Gametypes', 'gametype_id');
    }
}
