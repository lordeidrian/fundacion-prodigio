<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $postsQuery = Post::with(['category', 'tags', 'author'])->where('status', 'published')->latest();

        if ($request->filled('search')) {
            $postsQuery->where('title', 'like', '%' . $request->search . '%');
        }
        if ($request->filled('category')) {
            $postsQuery->whereHas('category', fn($q) => $q->where('slug', $request->category));
        }
        if ($request->filled('tag')) {
            $postsQuery->whereHas('tags', fn($q) => $q->where('slug', $request->tag));
        }

        $posts = $postsQuery->paginate(9)->withQueryString();
        $categories = Category::withCount('posts')->get()->where('posts_count', '>', 0);
        $tags = Tag::all();
        $recentPosts = Post::where('status', 'published')->latest()->take(5)->get();

        return view('noticias', compact('posts', 'categories', 'tags', 'recentPosts'));
    }

    public function show(Post $post)
    {
        abort_if($post->status !== 'published', 404);
        $post->load('author', 'category', 'tags');
        $categories = Category::withCount('posts')->get()->where('posts_count', '>', 0);
        $tags = Tag::all();
        $recentPosts = Post::where('id', '!=', $post->id)->where('status', 'published')->latest()->take(5)->get();

        return view('noticia-single', compact('post', 'categories', 'tags', 'recentPosts'));
    }
}
