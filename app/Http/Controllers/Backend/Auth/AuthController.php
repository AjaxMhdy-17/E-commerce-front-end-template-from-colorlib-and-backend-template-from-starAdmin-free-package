<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('admin.pages.auth.register');
    }
    public function registerStore(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins',
            'password' => 'required|min:6',
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->login($user);

        return redirect()->route('admin.dashboard')->with('success', 'Registion in successfully!');
    }

    public function login()
    {
        return view('admin.pages.auth.login');
    }
    public function loginStore(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully!');
        }
        return back()->with('error', 'Invalid Credentials!');
    }


    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('success', 'Admin Logged out successfully!');
    }
}
