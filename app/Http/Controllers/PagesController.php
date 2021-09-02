<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homepage(){
        return view('homepage.homepage', [
            'posts'=> Post::with('user')->latest()->get(),
        ]);;
    }

    public function inviteRegister(){
        return view('temporary.register', [
            'posts'=> Post::with('user')->latest()->get(),
        ]);;
    }
}
