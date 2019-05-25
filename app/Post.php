<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title' , 'message' , 'image' , 'user_id'];
    protected $appends = array('like_dislike');
    public function getLikeDislikeAttribute(){
        $like_msg = '';
        $dislike_msg = '';
        $other_like_msg = '';
        $other_dislike_msg = '';
        $check = false;
        if (Likes::where('user_id' , Auth::user()->id)->where('post_id' , $this->id)->count() > 0) {
            if(Likes::where('user_id' , Auth::user()->id)->where('post_id' , $this->id)->first()->like == 1){
                $check = true;
                $like_msg = 'Liked';
                $dislike_msg = 'Dislike This post';
            }
            else{
                $like_msg = 'Like This Post';
                $dislike_msg = 'Disliked';
            }
        }
        else{
            $like_msg = 'Like This Post';
            $dislike_msg = 'Dislike This post';
        }

        $total_dislike = Likes::where('post_id' , $this->id)->where('like' , 0)->count();
        $total_like = Likes::where('post_id' , $this->id)->where('like' , 1)->count();
        if($total_dislike > 0){
            $other_dislike_msg =  $total_dislike. ' people dislikes this';
        }
        else{
            $other_dislike_msg =  'No Dislikes';
        }
        if($total_like > 0 && $check == true){
            $other_like_msg =  ' You Liked this';
        }
        elseif($total_like > 0){
            $other_like_msg =  $total_like. ' people like this';
        }
        else {
            $other_like_msg = 'No Likes';
        }
        return [$like_msg , $other_like_msg , $dislike_msg , $other_dislike_msg];
    }
}
