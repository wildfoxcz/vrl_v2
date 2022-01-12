<?php

namespace App\Http\Controllers;

use App\Championship;
use App\Team;

class ChampionshipController extends Controller
{

    public function show(Championship $championship)
    {
        $championship = Championship::where('id', $championship->id)->with('races', 'users')->first();
        $teams = Team::whereHas('users', function($q) use($championship) {
            $q->whereHas('championships', function($q2) use($championship) {
                $q2->where('id', $championship->id);
            });
        })->get();
        return view('championships.show', compact('championship', 'teams'));
    }

    public function join(Championship $championship)
    {
        $championship->users()->attach(auth()->user());
        return redirect()->back();
    }
}
