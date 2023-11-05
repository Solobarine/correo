<?php

namespace App\Http\Controllers;

use App\Mail\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    //
    public function index()
    {
        if (auth()->user()) {
            return redirect('posts');
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed'
        ]);

        // Check If User Exists
        $user = User::where('email', $request->email)->first();
        if ($user) {
            return back()->with('status', 'User Already Exists');
        };

        // Create User
        $newUser = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->attempt($request->only(['email', 'password']));
        
        Mail::to($newUser)->send(new Registered($newUser));

        return redirect()->route('posts');
    }
}
