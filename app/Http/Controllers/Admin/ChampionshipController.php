<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Page;
use App\Circuit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ChampionshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $championship = Championship::all();

        return view('admin.championship.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.championship.create_or_edit');
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
        return redirect()->route('admin.championship.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $championship
     * @return \Illuminate\Http\Response
     */
    public function show(Championship $championship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $championship
     * @return \Illuminate\Http\Response
     */
    public function edit(Championship $championship)
    {

        return view('admin.championship.create_or_edit',
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $championship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Championship $championship)
    {
        $this->store_or_update($championship);
        return redirect()->route('admin.championship.index');
    }

    private function store_or_update(Championship $championship = null)
    {
        if(is_null($championship))
            $championship = new Championship ;

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

        $championship->slug = \Illuminate\Support\Str::random(30); // @todo Use slug function

        $championship->save();

        return $championship;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $championship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Championship $championship)
    {
        //
    }
}
