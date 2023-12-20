<?php

use App\Http\Controllers\auth\Registration;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(Registration::class)->name('auth.')->prefix('auth')->group(function(){
    Route::prefix('signup')->name('signup.')->group(function(){
        Route::view('index', 'auth.signup')->name('view');
        Route::post('simple', 'simple_signup')->name('simple');
    });

    Route::prefix('login')->name('login.')->group(function(){
        Route::view('index', 'auth.login')->name('view');
        Route::post('simple', 'simple_login')->name('simple');
    });
});
