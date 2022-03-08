<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
        
        $posts = Post::all();

        // Override the cover attribute of each post by changing it to an absolute url
        foreach ($posts as $post) {
            if ($post->cover) {
                $post->cover = url('storage/' . $post->cover);
            }
        }

        return response()->json([
            'success'=> true, 
            'result' => $posts
        ]);
    }

    public function show($slug) {

        $post = Post::where('slug', '=', $slug)->with('category', 'tags')->first();

        if ($post->cover) {
            $post->cover = url('storage/' . $post->cover);
        }

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
