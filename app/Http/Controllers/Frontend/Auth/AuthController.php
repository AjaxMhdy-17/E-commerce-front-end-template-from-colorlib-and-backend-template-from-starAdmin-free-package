<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {

        $data['categories'] = Category::all() ; 

        return view('front.pages.auth.register',$data);
    }
    public function registerStore(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        Auth::guard('web')->login($user);

        return redirect()->route('user.dashboard')->with('success',"Registration Successfull!") ; 
    }

    public function login()
    {

        $data['categories'] = Category::all() ; 
        return view('front.pages.auth.login',$data);
    }
    public function loginStore(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->route('user.dashboard')->with('success', 'Logged in successfully!');
        }
        return back()->with('error', 'Invalid Credentials!');
    }


    public function logout(Request $request)
    {

        Auth::guard('web')->logout();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'User Logged out successfully!');
    }


    public function forgetPassword()
    {
        return view('front.pages.auth.forget_password');
    }

    public function forgetPasswordStore(Request $request)
    {
        dd($request->all()) ; 
        return view('front.pages.auth.register');
    }

}
