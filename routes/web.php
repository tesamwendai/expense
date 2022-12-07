<?php

use App\Http\Controllers\Auth\LoginController;
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
// make route get login and post login
// Route::get('login',function(){
//     return view('auth.login');
// })->name('login');
// // make get register and post register
// Route::get('register',function(){
//     return view('auth.register');
// })->name('register');

// make route post login
// Route::post('login',[AuthenticatedSessionController::class,'store'])->name('login');
// make route post register
// Route::post('register',[AuthenticatedSessionController::class,'store'])->name('register');
Route::post('register',[LoginController::class,'register'])->name('register');

// make group middleware auth
Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('home',function(){
        return view('home.home');
    })->name('home');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
});