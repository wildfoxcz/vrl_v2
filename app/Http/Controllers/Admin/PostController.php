<?php

namespace App\Http\Controllers\Admin;

use App\Championship;
use App\Post;
use App\Circuit;
use App\PostCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        $postcategory = PostCategory::all();

        return view('admin.post.index', compact('posts','postcategory'));
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

        return view('admin.post.create_or_edit',
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
        return redirect()->route('admin.posts.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Race  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $postcategories = PostCategory::all();
        $circuits = Circuit::all();

        return view('admin.post.create_or_edit',
            compact(
                'postcategories',
                'circuits',
                'post'
            ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Race  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->store_or_update(post);
        return redirect()->route('admin.posts.index');
    }

    private function store_or_update(Post $post = null)
    {
        if(is_null($post))
            $post = new Post ;

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
            $post->$property = $value;
        }

        $post->slug = \Illuminate\Support\Str::random(30); // @todo Use slug function

        $post->save();

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
