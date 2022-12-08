<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
    return view('welcome');
});

Route::post('login',[LoginController::class,'login'])->name('login');
Route::post('register',[LoginController::class,'register'])->name('register');


// make group middleware auth
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('home',function(){
        return view('home.home');
    })->name('home');
    Route::get('user',[UserController::class,'index'])->name('user');
    // Logout
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
});