<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\OrganisationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return inertia('Home');
});

Route::get('/login', [LoginController::class, "create"])->middleware("guest");

Route::middleware('guest')->group(function () {

    //organisations routes
    Route::get('/organisations', [OrganisationController::class, 'index']);
    Route::get('/organisation/create', [OrganisationController::class, 'create']);
    Route::post('/organisations', [OrganisationController::class, 'store']);
    Route::get('/organisations/{organisation}', [OrganisationController::class, 'show'])->withTrashed();
    Route::get('/organisations/edit/{organisation}', [OrganisationController::class, 'edit'])->withTrashed();
    Route::put('/organisations/{organisation}', [OrganisationController::class, 'update'])->withTrashed();
    Route::delete('/organisations/{organisation}', [OrganisationController::class, 'destroy'])->withTrashed();

    //contacts routes
    Route::get('/contacts', [ContactController::class, 'index']);
});
