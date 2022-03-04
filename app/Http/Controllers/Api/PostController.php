<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        $posts = Post::all();

        return response()->json([
            'success'=> true, 
            'result' => $posts
        ]);
    }

    public function show($slug) {

        $post = Post::where('slug', '=', $slug)->first();

        if($post) {
            return response()->json([
                'success'=> true, 
                'result' => $post 
            ]);
        } else {
            return response()->json([
                'success'=> false, 
                'result' => [] 
            ]); 
        }
    }
}
