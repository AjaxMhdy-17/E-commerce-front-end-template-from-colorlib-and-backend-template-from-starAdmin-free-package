<?php

namespace App\Http\Controllers\Backend\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorDashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.index');
    }
}
