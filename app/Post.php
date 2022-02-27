<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// ----------------------------
use Illuminate\Support\Str;
// ----------------------------

class Post extends Model
{
    // States the table in the database
    protected $table = 'posts';

    // Allow mass assignment of table columns
    protected $fillable = [
        'title', 
        'content',
        'slug',
        'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category','category_id', 'id');
                            /** The second and third arguments aren't necessary 
                                * because they're already compiled by Laravel */
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    /** Generate a unique slug from a title
        * To use it, import the class and invoke the static method */
    public static function getUniqueSlug($title) {        
        $slug = Str::slug($title);
        $initial_slug = $slug;
        $post_found = Post::where('slug', '=', $slug)->first();        
        $counter = 1;         
        while($post_found) {
            $slug = $initial_slug . '-' . $counter;
            $post_found = Post::where('slug', '=', $slug)->first();
            $counter++;
        }
        return $slug;   
    }  
}
 