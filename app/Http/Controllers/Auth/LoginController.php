<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        if(!User::where('email',$request->email)->first()){
            return redirect()->back()->withErrors(["email" => "Tên tài khoản không tồn tại!"]);
        }
        return redirect()->back()->withErrors(["password" => "Email hoặc mật khẩu không đúng!"]);
    }
    public function register(Request $request){
        $user=$request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $path = $request->file('avatar')->store('/avatars',[
            'disk' => 'public',
        ]);
        $user =  User::create([
            'name' => $user['name'],
            'email' => $user['email'],
            'password' => Hash::make($user['password']),
            'avatar' => $path,
        ]);
        auth()->login($user);
        if(!$user){
            return back()->with('error','Something went wrong, please try again later');
        }else{
            return redirect("home")->withSuccess('You have signed-in');
        }
    }
    // make function logout
    public function logout() {
        // session()->flush();
        auth()->logout();
        return redirect('login');
    }
}
