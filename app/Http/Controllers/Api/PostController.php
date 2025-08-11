<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // GET /api/posts
    public function index()
    {
        $posts = Post::where('status', 'published')
            ->select('id', 'title', 'slug', 'excerpt', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json(['data' => $posts]);
    }

    // GET /api/posts/{id}
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);

        if ($post->status !== 'published') {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json([
            'data' => [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'excerpt' => $post->excerpt,
                'content' => $post->content,
                'author' => $post->user?->name,
                'created_at' => $post->created_at,
            ]
        ]);
    }
}