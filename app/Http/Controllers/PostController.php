<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes', 'comments'])->paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function new()
    {
        return view('posts.new');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'content' => 'required|min:2'
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('posts');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
