<?php

namespace App\Http\Controllers;

use App\Mail\PostLike;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LikesController extends Controller
{
    public function __construct() {
        return $this->middleware(['auth']);
    }

    public function store(Request $request, Post $post)
    {
        if ($post->likedBy($request->user())) {
            return back();
        }

        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        if(!$post->likes->onlyTrashed()->where('user_id', $request->user()->id)->count()) {
            Mail::to($post->user)->send(new PostLike($post, $post->user));
        }

        return back();
    }

    public function destroy(Request $request, Post $post)
    {
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
