<?php

namespace App\Http\Controllers;

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
