<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    // Express the name of the related table in the database
    protected $table = 'user_info';

    // Allow mass assignment of table columns
    protected $fillable = [
        'phone', 
        'address',
    ];

    // Identify the one-to-one relationship with the primary table
    public function user() {                
        return $this->belongsTo('app\User'); 
    }

}
