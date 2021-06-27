<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Http\Request\BlogRequest;

class BlogController extends Controller
{
    public function createBlog(){

        $categories=Category::all();
        return view('pages.blog.create',[
            'categories'=>$categories
        ]); 
    }

    public function store(BlogRequest $request){
    

        $post= Post::create([
             'user_id'=>auth()->user()->id,
             'category_id'=>$request['category'],
             'image_path'=>$request->hasFile('image')?$request->file('image')->getClientOriginalName():"",
             'title'=>$request['title'],
             'description'=>$request['description'],
             'text'=>$request['text']
         ]);

         if ($request->hasFile('image')) {
            $image=$request->file('image');
            $name =$image->getClientOriginalName();
            $destinationPath =base_path() . '/storage/app/public/images/'.$post->id;
            $image->move($destinationPath, $name);
        }

         if($post){
             return redirect()->route('welcome')->with('success','Blog successfully created');
         }
         return redirect()->route('welcome')->with('success','Blog was not created');

    }

    public function show($id){
        $blog=Post::find($id);
        return view('pages.blog.details',[
            'singleBlog'=>$blog
        ]); 
    }


}
