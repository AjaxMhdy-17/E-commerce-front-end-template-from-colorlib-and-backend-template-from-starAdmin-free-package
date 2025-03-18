<?php

namespace App\Http\Controllers\Frontend\Newsletter;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function newsletter(Request $request)
    {

        $data = $request->validate([
            'email' => 'required|unique:newsletters,email'
        ], [
            'email.required' => 'Please Enter A Valid Email',
            'email.unique' => 'This Email Has Already Been Subscribed!'
        ]);

        $done = Newsletter::create($data);
        return back()->with('success', "Subscribed Successfully!");
    }


   
}
