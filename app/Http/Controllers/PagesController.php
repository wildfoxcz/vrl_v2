<?php

namespace App\Http\Controllers;
use App\Post;

use App\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homepage(){
        $streams = Stream::all();
        $posts = DB::table('posts')->paginate(5);
        return view('homepage.homepage',compact('streams'), [
            'posts' => $posts,
        ]);;
    }


    public function inviteRegister(){
        return view('temporary.register', [
            'posts'=> Post::with('user')->latest()->get(),
        ]);;
    }
}
