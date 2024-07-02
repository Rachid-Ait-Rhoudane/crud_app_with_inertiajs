<?php

namespace App\Http\Controllers\auth;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() {

        return Inertia::render("Register");
    }

    public function store(Request $request) {

        $attributes = $request->validate([
            'name' => ['required', 'min:5'],
            'city' => ['required', 'min:5'],
            'address' => ['required', 'min:5'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed']
        ]);

        $user = User::create([...$attributes,
            'role' => 'owner',
            'password' => Hash::make($attributes['password'])
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
