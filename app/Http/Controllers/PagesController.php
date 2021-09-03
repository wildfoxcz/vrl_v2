<?php

namespace App\Http\Controllers;
use App\Post;

use App\Stream;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        $streams = Stream::all();
        return view('homepage.homepage',compact('streams'), [
            'posts'=> Post::with('user')->latest()->get(),
        ]);;
    }


    public function inviteRegister(){
        return view('temporary.register', [
            'posts'=> Post::with('user')->latest()->get(),
        ]);;
    }
}
