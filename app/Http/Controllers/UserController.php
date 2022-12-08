<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use DataTables;
class UserController extends Controller
{
    //make function get data user   
    public function index()
    {
        $user = User::all();
        return DataTables::of($user)->toJson();
    }
}
