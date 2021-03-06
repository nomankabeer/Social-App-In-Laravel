<?php

namespace App\Repositories;

use App\Comment;
use App\Follow;
use App\Likes;
use App\Post;
use App\Http\Controllers\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;

class PostRepository
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function getPosts()
     {
        return Post::get();
     }

     public function storePost($data)
     {
        $image = $data->file('image');
        $name = $this->uploadImage($image);
        $data = $data->all();
        unset($data['_token']);
        unset($data['image']);
        $data['user_id'] = Auth::user()->id;
        $data['image'] = $name;
        Post::create($data);
        return redirect()->route('index');
     }
     public function getPostDetail($id){
        return Post::where('id', $id)->first();
     }
     public function addCommentToPost($data){
        $data = array('post_id' => $data->post_id , 'user_id' => Auth::user()->id , 'comment' => $data->comment);
        Comment::create($data);
        return "success";
     }
     public function getPostComments($id){
        return Comment::where('post_id' , $id)->orderBy('id' , 'desc')->get();
     }
     public function followThisUser($data){
        $follow_id = $data->follow_id;
        $follow = Follow::where('user_id' , Auth::user()->id)->where('follow_id' , $follow_id);
        if($follow->first() != null && $follow->first() != ''){
            Follow::where('user_id' , Auth::user()->id)->where('follow_id' , $data->follow_id)->delete();
            return 'follow';
        }
        else{
            $data = $data->all();
            unset($data['_token']);
            Follow::create($data);
            return 'following';
        }
     }
     public function likeOrDislikePost($data){

         $value = $data->value;
         $post_id = $data->post_id;
         $post = Likes::where('user_id' , Auth::user()->id)->where('post_id' , $post_id);
         if ($post->first() == null ){
             Likes::create(['post_id' => $post_id , 'user_id' => Auth::user()->id , 'like' => $value]);
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

             $total_dislike = $post->where('like' , 0)->count();
             $total_like = $post->where('like' , 1)->count();
             $like_msg = 'Like This Post';
             $dislike_msg = 'Dislike This post';
             if($total_dislike > 0){
                 $other_dislike_msg =  $total_dislike. ' people dislikes this';
             }
             else{
                 $other_dislike_msg = 'No Dislikes';
             }

             if($total_like > 0){
                 $other_like_msg = ''.$total_like.' people likes this';
             }
             else{
                 $other_like_msg = 'No likes';
             }
             return [$like_msg , $other_like_msg , $dislike_msg , $other_dislike_msg];

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
