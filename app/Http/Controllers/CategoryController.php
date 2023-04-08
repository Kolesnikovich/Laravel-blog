<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
//    public function index(){
//        $categories = Category::all();
//        $posts = Post::with('category')->orderBy('id', 'desc')->paginate(2);
//        return view('categories.index', compact('posts', 'categories'));
//    }

    public function show($slug){
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->orderBy('id', 'desc')->paginate(2);
        return view('categories.show', compact('category', 'categories', 'posts'));
    }
}
