<?php

namespace App\Http\Controllers\auth;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //

    public function create() {

        return Inertia::render("Login");
    }
}
