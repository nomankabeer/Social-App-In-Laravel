<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopegetPosts(){
        $ids = Follow::where('user_id' , Auth::user()->id)->pluck('follow_id');
        $ids = $ids->prepend(Auth::user()->id);
        return DB::table('post')->select('post.id' , 'title' , 'message' , 'image' , 'users.name' , 'users.avatar', 'post.created_at')->join('users' , 'post.user_id' , 'users.id')->whereIn('user_id' ,$ids )->orderBy('post.id' , 'desc')->get() ;// Post::get();
    }
    public function scopegetUserProfilePosts(){
        return DB::table('post')->where('user_id' , Auth::user()->id)->select('title' , 'message' , 'image' , 'users.name' , 'users.avatar', 'post.created_at')->join('users' , 'post.user_id' , 'users.id')->orderBy('post.id' , 'desc')->get() ;// Post::get();
    }
    public function scopegetUserName($query , $id){
        return $query->where('id' , $id)->first()->name;
    }
    public function scopecountPosts($query , $id){
        return Post::where('user_id' , $id)->count();
    }
    public function scopegetUserFollowers($query , $id){
        return Follow::where('follow_id' , $id)->count();
    }
    public function scopegetUserFollowing($query , $id){
        return Follow::where('user_id' , $id)->count();
    }
    public function scopegetUserList($query){
        return $query->where('id' , '<>' , Auth::user()->id)->get();
    }
    public function scopeamIfollowingthisuser($query , $id){
        if(Follow::where('follow_id' , $id)->where('user_id' , Auth::user()->id)->first()){ return true; } else { return false;}
    }
    public function scopeisUserFollowMe($query , $id){
        if(Follow::where('follow_id' , Auth::user()->id)->where('user_id' , $id)->first()){ return true; } else { return false;}
    }
    public function scopegetFollowerUserList($query){
        $followers_id =  Follow::where('follow_id' , Auth::user()->id)->pluck('user_id');
        return $query->whereIn('id' , $followers_id )->get();
    }
    public function scopegetFollowingUserList($query){
        $following_id = Follow::where('user_id' , Auth::user()->id)->pluck('follow_id');
        return $query->whereIn('id' , $following_id)->get();
    }
}
