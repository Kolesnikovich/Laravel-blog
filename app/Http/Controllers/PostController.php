<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        $categories = Category::all();
        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
        return view('posts.index', compact('posts', 'categories'));
    }

    public function show($slug){
        $categories = Category::all();
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views++;
        $post->update();
        return view('posts.show', compact('post', 'categories'));
    }
}
