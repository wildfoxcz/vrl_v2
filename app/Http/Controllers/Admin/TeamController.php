<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Gametype;
use App\Page;
use Image;
use App\Circuit;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        $gametypes = Gametype::all();
        return view('admin.team.index', compact('teams', 'gametypes'))->with('gametypes',$gametypes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        $gametypes = Gametype::all();
        return view('admin.team.create_or_edit', compact('teams','gametypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.teams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        $gametypes = Gametype::all();
        return view('admin.team.create_or_edit', compact('team','gametypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $this->store_or_update($team);
        return redirect()->route('admin.teams.index');
    }

    private function store_or_update(Team $team = null)
    {
        $request = request();

        if(is_null($team))
            $team = new Team;

        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
            'gametype_id'=> 'required',
        ];

        $this->validate(request(), $rules);

        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                // Get Image Extension
                $extension = $image_tmp->getClientOriginalExtension();
                // Generate new image name
                $imageName  = rand(111,99999).'.'.$extension;
                $imagePath = 'images/teams/'.$imageName;
                // Upload the image
                Image::make($image_tmp)->save($imagePath);
                // Save Circuit Image
                $team->image = $imageName;
            }
        }

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $team->$property = $value;
        }

        $team->slug = \Illuminate\Support\Str::slug($team->name,'-');

        $team->save();

        return $team;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        //
    }
}
