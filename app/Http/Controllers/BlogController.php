<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Http\Request\BlogRequest;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    public function createBlog()
    {

        $categories = Category::all();
        return view('pages.blog.create', [
            'categories' => $categories
        ]);
    }

    public function updateBlog($id)
    {
        $post = Post::where(['user_id' => auth()->user()->id, 'id' => $id])->first();
        $categories = Category::all();

        return view('pages.blog.update',
            [
                'post' => $post,
                'categories' => $categories
            ]);
    }


    public function store(BlogRequest $request)
    {


        $post = Post::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request['category'],
            'image_path' => $request->hasFile('image') ? $request->file('image')->getClientOriginalName() : "",
            'title' => $request['title'],
            'description' => $request['description'],
            'text' => $request['text']
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = base_path() . '/storage/app/public/images/' . $post->id;
            $image->move($destinationPath, $name);
        }

        if ($post) {
            return redirect()->route('welcome')->with('success', 'Blog successfully created');
        }
        return redirect()->route('welcome')->with('success', 'Blog was not created');

    }

    public function update(BlogRequest $request, $id)
    {

        $post = Post::where(['id' => $id, 'user_id' => auth()->user()->id])->first();

        $model = $post->update([
            'category_id' => $request['category'],
            'image_path' => $request->hasFile('image') ? $request->file('image')->getClientOriginalName() : $post->image_path,
            'title' => $request['title'],
            'description' => $request['description'],
            'text' => $request['text']
        ]);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/images/' . $post->id . '/' . $post->image_path)) {
                Storage::delete('public/images/' . $post->id . '/' . $post->image_path);
            }
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $destinationPath = base_path() . '/storage/app/public/images/' . $post->id;
            $image->move($destinationPath, $name);
        }


        if ($model) {
            return redirect()->route('welcome')->with('success', 'Blog successfully updated');
        }
        return redirect()->route('welcome')->with('success', 'Blog was not updated');


    }

    public function show($id)
    {

        $post = Post::find($id);
        $latestPosts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::all();
        return view('pages.blog.details', [
            'post' => $post,
            'latestPosts' => $latestPosts,
            'categories' => $categories,
        ]);
    }

    public function userBlogs()
    {
        $posts = Post::where(['user_id' => auth()->user()->id])->paginate(10);
        $latestPosts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $categories = Category::all();
        return view('pages.blog.my-blog',
            [
                'posts' => $posts,
                'latestPosts' => $latestPosts,
                'categories' => $categories,
            ]);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        if (Storage::exists('public/images/' . $post->id . '/' . $post->image_path)) {
            Storage::delete('public/images/' . $post->id . '/' . $post->image_path);
        }
        return redirect()->route('welcome')->with('success', 'Blog was successfully deleted');
    }

}
