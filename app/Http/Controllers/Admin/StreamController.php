<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class StreamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $streams = Stream::all();

        return view('admin.stream.index', compact('streams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.stream.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.streams.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stream $stream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stream $stream)
    {

        return view('admin.stream.create_or_edit', compact('stream'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stream $stream)
    {
        $this->store_or_update($stream);
        return redirect()->route('admin.streams.index');
    }

    private function store_or_update(Stream $stream = null)
    {
        if(is_null($stream))
            $stream = new Stream;

        $rules = [
            'name' => 'required|string',
            'video_url' => 'required|string',
            'description' => 'required|string',
        ];

        $this->validate(request(), $rules);

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $stream->$property = $value;
        }

        $stream->slug = \Illuminate\Support\Str::slug($stream->title,'-');

        $stream->save();

        return $stream;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stream $stream)
    {
        //
    }
}
