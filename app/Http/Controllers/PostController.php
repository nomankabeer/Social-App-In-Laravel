<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Follow;
use App\Likes;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    use UploadImage;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        return view('index' , compact('posts'));
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = $this->uploadImage($image);
        $request = $request->all();
        Arr::forget($request , '_token');
        Arr::forget($request , 'image');
        $added_user_id = Arr::add( $request , 'user_id' , Auth::user()->id);
        $added_image = Arr::add( $added_user_id, 'image' , $name);
        Post::create($added_image);
        return redirect()->route('index');
    }
     public function postDetails($id){
        $post = Post::where('id', $id)->first();
        return view('post_detail' , compact('post'));
     }
     public function LikeDislikePost(Request $request){

         $value = $request->value;
         $post_id = $request->post_id;
         $post = Likes::where('user_id' , Auth::user()->id)->where('post_id' , $post_id);
         $message = [];
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

     public function AddComment(Request $request){
        Comment::create(['post_id' => $request->post_id , 'user_id' => Auth::user()->id , 'comment' => $request->comment]);
        return "success";
     }
    public function getComment($id){
        return Comment::where('post_id' , $id)->orderBy('id' , 'desc')->get();
    }

    public function followUser(Request $request){
        $follow_id = $request->follow_id;
        $follow = Follow::where('user_id' , Auth::user()->id)->where('follow_id' , $follow_id);
        if($follow->first() != null && $follow->first() != ''){

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
