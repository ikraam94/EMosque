<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\frontController;
use App\Http\Controllers\historyController;
use App\Http\Controllers\activityController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\associationController;

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
Route::get('/',[frontController::class,"index"]);

Route::redirect('home','dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout',[authController::class,"logout"]);


Route::prefix('dashboard') ->middleware('auth') -> group(
    function()
    {
        Route::get('/',[homepageController::class,'index']);
        Route::resource('homepage', homepageController::class);
        Route::resource('history', historyController::class);
        Route::resource('activity', activityController::class);
        Route::resource('association', associationController::class);
        Route::get('googleAutoComplete', [locationController::class,'index']);
        
        
    }
);



