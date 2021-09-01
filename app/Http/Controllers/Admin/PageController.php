<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Page;
use App\Circuit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();

        return view('admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.page.create_or_edit');
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
        return redirect()->route('admin.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {

        return view('admin.page.create_or_edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $this->store_or_update($page);
        return redirect()->route('admin.pages.index');
    }

    private function store_or_update(Page $page = null)
    {
        if(is_null($page))
            $page = new Page;

        $rules = [
            'title' => 'required|string',
            'content' => 'required|string',
        ];

        $this->validate(request(), $rules);

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $page->$property = $value;
        }

        $page->slug = \Illuminate\Support\Str::slug($page->title,'-');

        $page->save();

        return $page;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $page)
    {
        //
    }
}
