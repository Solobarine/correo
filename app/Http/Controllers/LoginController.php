<?php

namespace App\Http\Controllers;

use App\Mail\LoggedIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()) {
            return redirect('posts');
        }

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only(['email', 'password']), ($request->remember) ? true : false)) {
            Mail::to(auth()->user())->send(new LoggedIn(auth()->user()));
            return redirect()->route('posts');  
        }

        return back()->with('status', 'Invalid Email or Password');
    }
}
