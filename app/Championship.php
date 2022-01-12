<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Championship extends Model
{
    protected $table = "championship";

    public function races()
    {
         return $this->hasMany('App\Race');
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sumUserPoints(User $user)
    {
        $sum = 0;
        $usersInRaces = $this->races()->with('users')->get()->pluck('users.*');
        foreach($usersInRaces as $usersInRace)
        {
            foreach($usersInRace as $userInRace)
            {
                if($userInRace->id == $user->id)
                    $sum += $userInRace->pivot->points - $userInRace->pivot->penalty_points;
            }
        }
        return $sum;
    }

    public function sumUserPenaltyPoints(User $user)
    {
        $sum = 0;
        $usersInRaces = $this->races()->with('users')->get()->pluck('users.*');
        foreach($usersInRaces as $usersInRace)
        {
            foreach($usersInRace as $userInRace)
            {
                if($userInRace->id == $user->id)
                    $sum -= $userInRace->pivot->penalty_points;
            }
        }
        return $sum;
    }

    public function sumTeamPoints(Team $team)
    {
        $sum = 0;
        $usersInRaces = $this->races()->with('users', 'users.teams')->get()->pluck('users.*');
        foreach($usersInRaces as $usersInRace)
        {
            foreach($usersInRace as $userInRace)
            {
                foreach($userInRace->teams as $team)
                {
                    if($team->id == $team->id)
                        $sum += $userInRace->pivot->points - $userInRace->pivot->penalty_points;
                }
            }
        }
        return $sum;
    }

    public function sumTeamPenaltyPoints(Team $team)
    {
        $sum = 0;
        $usersInRaces = $this->races()->with('users', 'users.teams')->get()->pluck('users.*');
        foreach($usersInRaces as $usersInRace)
        {
            foreach($usersInRace as $userInRace)
            {
                foreach($userInRace->teams as $team)
                {
                    if($team->id == $team->id)
                        $sum -= $userInRace->pivot->penalty_points;
                }
            }
        }
        return $sum;
    }
}
