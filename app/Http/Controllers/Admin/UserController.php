<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Hash;
use Session;
use Auth;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.user.create_or_edit');
    }

    /**
     * Store a newly created resource in storage.

     */
    public function store(Request $request)
    {
        $this->store_or_update();
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {

        return view('admin.user.create_or_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->store_or_update($user);
        return redirect()->route('admin.user.index');
    }

    private function store_or_update(User $user = null)
    {
        if(is_null($user))
            $user = new User;

        $rules = [
            'name' => 'required|string',
            'email' => 'required|string',
        ];

        $this->validate(request(), $rules);



        $properties = array_keys($rules);
        foreach(array_intersect_key(request()->input(), array_flip($properties)) as $property => $value)
        {
            $user->$property = $value;
        }


        $user->save();

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
