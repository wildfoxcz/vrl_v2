<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Race;
use App\Circuit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::all();

        return view('admin.race.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $championships = Championship::all();
        $circuits = Circuit::all();

        return view('admin.race.create_or_edit',
            compact(
                'championships',
                'circuits'
            ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.races.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function show(Race $race)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        $championships = Championship::all();
        $circuits = Circuit::all();

        return view('admin.race.create_or_edit',
            compact(
                'championships',
                'circuits',
                'race'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Race $race)
    {
        $this->store_or_update($race);
        return redirect()->route('admin.races.index');
    }

    private function store_or_update(Race $race = null)
    {
        if(is_null($race))
            $race = new Race;

        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'started_at' => 'required|date',
            'championship_id' => 'nullable|exists:championship,id',
            'circuit_id'  => 'required|exists:circuits,id',
        ];

        $this->validate(request(), $rules);

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $race->$property = $value;
        }

        $race->slug = \Illuminate\Support\Str::random(30); // @todo Use slug function

        $race->save();

        return $race;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //
    }
}
