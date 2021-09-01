<?php

namespace App;
use App\Circuit;
use Carbon\Carbon;
use App\Championship;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function championship()
    {
        return $this->belongsTo('App\Championship','championship_id');

    }

    public function users()
    {
        return $this->belongsToMany(User::class, "races_users")->withPivot('points', 'penalty_points');
    }

    public function circuits()
    {
        return $this->belongsTo('App\Circuit', 'circuit_id');
    }

}
