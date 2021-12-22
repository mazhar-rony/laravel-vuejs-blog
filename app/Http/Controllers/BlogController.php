<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
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

    public function getAllCategory()
    {
        $categories = Category::with('posts')->get();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function getLatestPosts()
    {
        $latestposts = Post::with('user','category')->orderBy('id', 'DESC')->take(5)->get();

        return response()->json([
            'latestposts' => $latestposts
        ], 200);
    }

    public function getPostsByCategory($id)
    {
        $categoryposts = Post::with('user','category')->where('category_id', $id)->orderBy('id', 'DESC')->get();

        return response()->json([
            'categoryposts' => $categoryposts
        ], 200);
    }

    public function getSearchPosts()
    {
        $search = \Request::get('q');

        $searchpost = Post::with('user','category')
                    ->where('title', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%")
                    ->get();

            return response()->json([
                'searchpost' => $searchpost
            ], 200);
    }
}
