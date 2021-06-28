<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {

        $latestPosts = Post::orderBy('created_at', 'desc')->paginate(10);
        $sliderPosts = Post::inRandomOrder()->get();
        $categories = Category::all();

        return view('pages.home.index',
            [
                'latestPosts' => $latestPosts,
                'categories' => $categories,
                'sliderPosts' => $sliderPosts
            ]);
    }

    public function profile(){

    }

}
