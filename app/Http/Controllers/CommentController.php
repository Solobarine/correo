<?php

namespace App\Http\Controllers;

use App\Mail\PostComment;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function __construct() {
        return $this->middleware(['auth']);
    }

    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'content' => 'required|max:255'
        ]);

        $comment = $post->comments()->create([
            'user_id' => $request->user()->id,
            'content' => $request->content
        ]);

        Mail::to($post->user)->send(new PostComment($post, $comment));

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize("destroy", $comment);

        $comment->delete();

        return back()->with("status", "Comment Deleted Successfully");
    }
}
