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

    public function circuit()
    {
        return $this->belongsTo('App\Circuit', 'circuit_id');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function sumTeamPoints(Team $team)
    {
        $sum = 0;
        $users = $this->users()->with('teams')->get();
        foreach($users as $user)
        {
            foreach($user->teams as $team)
            {
                if($team->id == $team->id)
                    $sum += $user->pivot->points;
            }
        }
        return $sum;
    }

}
