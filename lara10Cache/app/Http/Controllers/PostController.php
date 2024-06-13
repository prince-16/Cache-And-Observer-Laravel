<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function index(){
        //now we are using cache
        $posts = Cache::remember('posts', 60*60, function(){
            return Post::all();
        });
        return response($posts, 200);
        
        //for showing normal post
        // $posts = Post::all();
        // return response($posts, 200);
    }

    public function store(Request $request){
        $post = Post::create($request->all());
        return response($post, 200);
    }
}
