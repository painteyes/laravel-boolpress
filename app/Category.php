<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Category extends Model
{
    public function posts() {
        return $this->hasMany('App\Post', 'category_id', 'id');
                        /** The second and third arguments aren't necessary 
                            * because they're already compiled by Laravel */
    }
}
