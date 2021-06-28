<?php

namespace App\Http\Controllers;

use App\Http\Request\ProfileRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Profile;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $latestPosts = Post::orderBy('created_at', 'desc')->paginate(10);
        $sliderPosts = Post::inRandomOrder()->get();
        $categories = Category::all();

        return view('pages.home.index',
            [
                'lastPosts' => $latestPosts,
                'categories' => $categories,
                'sliderPosts' => $sliderPosts
            ]);
    }

    public function profile()
    {
        $user = User::find(auth()->user()->id);
        return view('pages.profile.index', [
            'user' => $user
        ]);
    }

    public function updateProfile(ProfileRequest $request)
    {

        $profile = Profile::find(auth()->user()->id);
        if (!$profile) {
            Profile::create([
                'user_id' => auth()->user()->id,
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'phone' => $request['phone'] ?: "",
                'country' => $request['country'] ?: "",
            ]);
        } else {
            $profile->update([
                'first_name' => $request['first_name'],
                'last_name' => $request['last_name'],
                'phone' => $request['phone'] ?: "",
                'country' => $request['country'] ?: "",
            ]);
        }

        return redirect()->route('myProfile')->with('success', 'Profile successfully updated');

    }

}
