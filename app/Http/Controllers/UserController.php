<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function show(User $user)
    {
        $posts = Post::latest()->where("user_id", $user->id)->limit(5)->get();

        return view("user.show", [
            "user" => $user,
            "posts" => $posts
        ]);
    }

    public function edit()
    {
        return view("user.edit");
    }

    public function updateProfile(Request $request, User $user)
    {
        $this->validate($request, [
            "name" => "required|max:255",
            "username" =>"required|max:255"
        ]);

        $this->authorize('isCorrectUser', $user);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->avatar = $request->avatar ? $request->avatar : null;
        $user->save();

        return redirect()->route('user.edit')->with("update_bio", "Bio Successfully Changed");
    }

    public function updatePassword(Request $request, User $user)
    {
        $this->validate($request, [
            'old_password' => 'required|max:255',
            'new_password' => 'required|confirmed'
        ]);

        $this->authorize('isCorrectUser', $user);

        $isPassword = Hash::check($request->old_password, $user->password);

        if ($isPassword) {
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect()->route('user.edit')->with("update_success", "Password Succssfully changed");
        } else {
            return redirect()->route('user.edit')->with("update_failed", "Incorrect Password");
        }

    }

    public function destroy(User $user)
    {
        $this->authorize('deleteAccount', $user);

        $user->destroy($user->id);

        return redirect()->route('home');


    }
}
