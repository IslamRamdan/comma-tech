<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a paginated list of posts.
     */
    public function index()
    {
        $posts = Post::orderByDesc('created_at')->paginate(6);
        return view('blog.index', compact('posts'));
    }

    /**
     * Show a single post.
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        // Fetch related posts (same category not defined, fallback to recent)
        $related = Post::where('id', '!=', $post->id)->orderByDesc('created_at')->take(3)->get();
        return view('blog.show', compact('post', 'related'));
    }
}
