<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    Protected $table = 'likes';
    protected $fillable = ['post_id' , 'user_id' , 'like'];
}
