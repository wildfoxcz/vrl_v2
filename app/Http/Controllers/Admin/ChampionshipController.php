<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $championships = Championship::all();

        return view('admin.championship.index', compact('championships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.championship.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.championship.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Championship $championship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Championship $championship)
    {

        return view('admin.championship.create_or_edit', compact('championship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Championship $championship)
    {
        $this->store_or_update($championship);
        return redirect()->route('admin.championship.index');
    }

    private function store_or_update(Championship $championship = null)
    {
        if(is_null($championship))
            $championship = new Championship();

        $rules = [
            'name' => 'required|string',
            'description' => 'required|string',
        ];

        $this->validate(request(), $rules);

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $championship->$property = $value;
        }

        $championship->slug = \Illuminate\Support\Str::slug($championship->name,'-');

        $championship->save();

        return $championship;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Championship $championship)
    {
        //
    }
}
