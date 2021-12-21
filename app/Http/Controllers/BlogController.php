<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function allBlogPost()
    {
        $blogposts = Post::with('category', 'user')->latest()->get();

        return response()->json([
            'blogposts' => $blogposts
        ], 200);
    }

    public function getPostById($id)
    {
        $post = Post::with('category', 'user')->where('id', $id)->get();

        return response()->json([
            'post' => $post
        ], 200);
    }
}
