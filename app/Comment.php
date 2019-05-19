<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['post_id' , 'user_id' , 'comment'];
    protected $appends = array('user_details');
    public function getUserDetailsAttribute(){
    return User::select('avatar' , 'name')->where('id' , $this->user_id)->first();
    }
}
