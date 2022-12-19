<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Check remember_me
        if($request->remember_me){
            $remember_me = true;
        }else{
            $remember_me = false;
        }

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials,$remember_me)) {
            return redirect()->intended('home')
                ->withSuccess('You have Successfully loggedin!');
        }
        return redirect("login")->withErrors('Login credentials are not valid!');
    }
    public function register(Request $request){
        // dd($request->all());
        $user=$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        // $data = $request->all();
        $check =  User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
        ]);
        auth()->attempt($user);
        if(!$check){
            return back()->with('error','Something went wrong, please try again later');
        }else{
            return redirect("home")->withSuccess('You have signed-in');
        }
    }
    // make function change language
    public function changeLanguage($language)
    {
        // $locale = \App::currentLocale();

        // if($locale!= $language)
            \App::setlocale($language);
        return redirect()->back();

    }
    // make function logout
    public function logout() {
        // session()->flush();
        auth()->logout();
        return redirect('login');
    }
}
