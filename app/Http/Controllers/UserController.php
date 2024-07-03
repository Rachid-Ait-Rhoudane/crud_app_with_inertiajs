<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return Inertia::render('Profile', [
            'user' => $user->only(['id', 'name', 'city', 'address', 'email', 'role'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['min:5'],
            'city' => ['min:5'],
            'address' => ['min:5'],
            'email' => ['email'],
            'role' => ['required']
        ]);

        if($request->hasFile('avatar')) {

            $files = $request->validate([
                'avatar' => ['mimes:jpg,png']
            ]);

            $attributes['avatar'] = Storage::disk('public')->put('avatars', $files['avatar']);

            if($user->avatar !== 'avatars/unknown_user.png') {

                Storage::disk('public')->delete($user->avatar);
            }
        }

        if($request->filled('password')) {

            $inputs = $request->validate([
                'password' => ['min:7', 'confirmed']
            ]);

            $attributes['password'] = $inputs['password'];
        }

        $user->update($attributes);

        return redirect('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
