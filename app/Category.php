<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Category extends Model
{
    public function posts() {
        return $this->hasMany('App\Posts');
    }
}
