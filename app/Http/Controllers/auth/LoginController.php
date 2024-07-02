<?php

namespace App\Http\Controllers\auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    public function create() {

        return Inertia::render("Login");
    }

    public function store(Request $request) {

        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($attributes)) {

            return redirect('/');
        }

        return back()->withErrors([
            'email' => "The provided credentials don't match our records"
        ]);
    }

    public function destroy() {

        Auth::logout();

        return redirect('/login');
    }
}
