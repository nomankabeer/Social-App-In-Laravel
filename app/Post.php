<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'post';
    protected $fillable = ['title' , 'message' , 'image' , 'user_id'];
    protected $appends = array('like_dislike');
    public function getLikeDislikeArrtibute(){






        $post = Likes::where('user_id' , Auth::user()->id)->where('post_id' , $this->id);
        if ($post->first() == null ){
            $total_dislike = $post->where('like' , 0)->count();
            $total_like = $post->where('like' , 1)->count();



            if($value == 1){
                $like_msg = 'Liked';
                $dislike_msg = 'Dislike This post';
                if($total_like >1){
                    $other_like_msg = 'You and other '.$total_like.' people likes this';// , 'Dislike this post' , $total_dislike. ' people dislike this'];
                }
                else{
                    $other_like_msg = 'You liked this';
                }

                if($total_dislike > 0){
                    $other_dislike_msg =  $total_dislike. ' people dislikes this';
                }
                else{
                    $other_dislike_msg = 'No Dislikes';
                }

            }
            elseif($value == 0){

                $like_msg = 'Like This Post';
                $dislike_msg = 'Disliked';
                if($total_dislike > 1){
                    $other_dislike_msg = 'You and other '.$total_dislike.' people dislikes this';// , 'Dislike this post' , $total_dislike. ' people dislike this'];
                }
                else{
                    $other_dislike_msg = 'You disliked this';
                }

                if($total_like > 0){
                    $other_like_msg = ''.$total_like.' people likes this';
                }
                else{
                    $other_like_msg = 'No likes';
                }
            }
            return [$like_msg , $other_like_msg , $dislike_msg , $other_dislike_msg];

        }
        elseif($post->where('like' , $value)->first() != null){
            $post->delete();



        }
        else{
            Likes::where('user_id' , Auth::user()->id)->where('post_id' , $post_id)->update(['like' => $value]);


            $total_dislike = $post->where('like' , 0)->count();
            $total_like = $post->where('like' , 1)->count();
            if($value == 1){
                $like_msg = 'Liked';
                $dislike_msg = 'Dislike This post';
                if($total_like >1){
                    $other_like_msg = 'You and other '.$total_like.' people likes this';// , 'Dislike this post' , $total_dislike. ' people dislike this'];
                }
                else{
                    $other_like_msg = 'You liked this';
                }

                if($total_dislike > 0){
                    $other_dislike_msg =  $total_dislike. ' people dislikes this';
                }
                else{
                    $other_dislike_msg = 'No Dislikes';
                }

            }
            elseif($value == 0){

                $like_msg = 'Like This Post';
                $dislike_msg = 'Disliked';
                if($total_dislike > 1){
                    $other_dislike_msg = 'You and other '.$total_dislike.' people dislikes this';// , 'Dislike this post' , $total_dislike. ' people dislike this'];
                }
                else{
                    $other_dislike_msg = 'You disliked this';
                }

                if($total_like > 0){
                    $other_like_msg = ''.$total_like.' people likes this';
                }
                else{
                    $other_like_msg = 'No likes';
                }
            }
            return [$like_msg , $other_like_msg , $dislike_msg , $other_dislike_msg];


        }





    }
}
