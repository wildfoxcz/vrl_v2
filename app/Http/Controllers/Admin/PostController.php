<?php

namespace App\Http\Controllers\Admin;
use App\Post;
use App\User;
use App\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $postcategories = PostCategory::all();
        return view('admin.post.create_or_edit', compact('postcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $postcategories = PostCategory::all();
        return view('admin.post.create_or_edit', compact('post','postcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->store_or_update($post);
        return redirect()->route('admin.posts.index');
    }


    private function store_or_update(Post $post = null)
    {
        if(is_null($post))
            $post = new Post;

        $rules = [
            'title' => 'required|string',
            'short_desc' => 'required|string',
            'long_desc' => 'required|string',
            'category_id' => 'nullable|exists:post_categories,id',

        ];

        $this->validate(request(), $rules);
        $request = request();
        //Upload image
        if($request->hasFile('image')){
            $image_tmp = $request->file('image');
            if($image_tmp->isValid()){
                // Get Image Extension
                $extensionImage = $image_tmp->getClientOriginalExtension();
                // Generate new image name
                $imageName  = rand(1111,99999).'.'.$extensionImage;
                $imagePath = 'images/posts/'.$imageName;
                // Upload the image
                Image::make($image_tmp)->save($imagePath);
                // Save Circuit Image
                $post->image = $imageName;
            }
        }

        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $post->$property = $value;
        }
        $post->user_id = auth()->id();
        $post->slug = \Illuminate\Support\Str::slug($post->title,'-');


        $post->save();
        dd($post);
        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
