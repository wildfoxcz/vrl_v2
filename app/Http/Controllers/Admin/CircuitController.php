<?php

namespace App\Http\Controllers\Admin;
use App\Circuit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CircuitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $circuits = Circuit::all();

        return view('admin.circuit.index', compact('circuits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.circuit.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.circuits.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Circuit $circuit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Circuit $circuit)
    {

        return view('admin.circuit.create_or_edit', compact('circuit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Circuit $circuit)
    {
        $this->store_or_update($circuit);
        return redirect()->route('admin.circuits.index');
    }

    private function store_or_update(Circuit $circuit = null)
    {
        if(is_null($circuit))
            $circuit = new Circuit();

        $rules = [
            'name' => 'required|string',
            'country' => 'required',
            'turns' => 'required',
            'fastest_time' => 'required',
            'circuit_length' => 'required',
        ];



        $this->validate(request(), $rules);

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $circuit->$property = $value;
        }

        $circuit->slug = \Illuminate\Support\Str::slug($circuit->name,'-');
        $circuit->save();

        return $circuit;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Circuit $circuit)
    {
        //
    }
}
