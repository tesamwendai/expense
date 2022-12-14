<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RoleController;
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
    // Users manager
    // make group user-manager
    Route::group(['prefix' => 'user-manager'], function () {
        // User manager
        Route::get('/',[UserController::class,'index'])->name('user-manager');
        Route::get('get-user',[UserController::class,'getUser'])->name('user-manager.get-user');

    });
    // Role manager
    Route::group(['prefix'=>'role-manager'],function(){
        Route::get('/',[RoleController::class,'index'])->name('role-manager');
        Route::get('get-role',[RoleController::class,'getRole'])->name('role-manager.get-role');
        Route::post('insert-role',[RoleController::class,'insertRole'])->name('role-manager.insert-role');
        Route::post('update-role',[RoleController::class,'updateRole'])->name('role-manager.update-role');
        Route::post('delete-role',[RoleController::class,'deleteRole'])->name('role-manager.delete-role');
    });
    // Route::get('list-user',[UserController::class,'index'])->name('list-user');
    // Route::get('get-user',[UserController::class,'getUser'])->name('get-user');
    // Logout
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
});