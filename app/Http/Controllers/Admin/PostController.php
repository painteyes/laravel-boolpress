<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// ----------------------------
use App\Post;
use Illuminate\Support\Str;
use App\Category;
use App\Tag;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $recipes = config('recipes');

        return view('admin.posts.index', compact('posts', 'recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationRules());
        $form_data = $request->all();      
        $new_post = new Post();
        $new_post->fill($form_data); 
        $new_post->slug = Post::getUniqueSlug($form_data['title']);
        $new_post->save();

        
        // Save tags relations
        if(array_key_exists('tags', $form_data)) { 
    /** OR isset($form_data['tags']) */
            $new_post->tags()->sync($form_data['tags']);
        } 
        

        return redirect()->route('admin.posts.show', ['post' => $new_post->id ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $recipes = config('recipes');

        return view('admin.posts.show', compact('post', 'recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $form_data = $request->all();
        $request->validate($this->getValidationRules()); 
        $post = Post::findOrFail($id);  

        if($form_data['title'] != $post->title) {
            $form_data['slug'] = $this->getUniqueSlug($form_data['title']);
        }
        
        $post->update($form_data);

        return redirect()->route('admin.posts.show', ['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    protected function getValidationRules() {
        return [
            'title' => 'required|max:250',
            'content' => 'required|min:20|max:5000',
            'category_id' => 'exists:categories,id|nullable' /** Validate if the value exists in a column of a related table or is null */
        ];
    }
}
 