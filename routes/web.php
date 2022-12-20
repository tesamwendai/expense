<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UploadController;
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

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('register', [LoginController::class, 'register'])->name('register');

Route::group(['middleware' => 'language'], function() {
    Route::get('change-language/{lang}', [SettingController::class, 'changeLanguage'])->name('change-language');
});

// make route upload image
Route::post('upload-avatar', [UploadController::class, 'processAvatar'])->name('upload-avatar');
Route::delete('revert-avatar', [UploadController::class, 'revertAvatar'])->name('revert-avatar');



// make group middleware auth
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('home', function () {
        return view('home.home');
    })->name('home');
    // Users manager
    // make group user-manager
    Route::group(['prefix' => 'user-manager'], function () {
        // User manager
        Route::get('/', [UserController::class, 'index'])->name('user-manager');
        Route::get('get-user', [UserController::class, 'getUser'])->name('user-manager.get-user');
    });
    // Role manager
    Route::group(['prefix' => 'role-manager'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role-manager');
        Route::get('get-role', [RoleController::class, 'getRole'])->name('role-manager.get-role');
        Route::get('get-role-by-id', [RoleController::class, 'getRoleById'])->name('role-manager.get-role-by-id');
        Route::post('insert-role', [RoleController::class, 'insertRole'])->name('role-manager.insert-role');
        Route::post('update-role', [RoleController::class, 'updateRole'])->name('role-manager.update-role');
        Route::post('delete-role', [RoleController::class, 'deleteRole'])->name('role-manager.delete-role');
    });
    // Permission manager
    Route::group(['prefix' => 'permission-manager'], function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission-manager');
        Route::get('get-permission', [PermissionController::class, 'getPermission'])->name('permission-manager.get-permission');
        Route::get('get-permission-by-id', [PermissionController::class, 'getPermissionById'])->name('permission-manager.get-permission-by-id');
        Route::post('insert-permission', [PermissionController::class, 'insertPermission'])->name('permission-manager.insert-permission');
        Route::post('update-permission', [PermissionController::class, 'updatePermission'])->name('permission-manager.update-permission');
        Route::post('delete-permission', [PermissionController::class, 'deletePermission'])->name('permission-manager.delete-permission');
    });
    // Route::get('list-user',[UserController::class,'index'])->name('list-user');
    // Route::get('get-user',[UserController::class,'getUser'])->name('get-user');
    // Logout
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
