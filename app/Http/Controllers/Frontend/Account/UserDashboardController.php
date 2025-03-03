<?php

namespace App\Http\Controllers\Frontend\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user() ; 
        return view('front.pages.account.dashboard',['user' => $user]);
    }
}
