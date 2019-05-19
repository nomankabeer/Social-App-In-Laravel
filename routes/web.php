<?php
Auth::routes();
Route::group(
    ['middleware' => 'auth'] ,
    function(){
        Route::get('index' , 'PostController@index')->name('index');

        Route::view('profile' , 'profile')->name('profile');
        Route::view('add/post' , 'add_post')->name('add.post');
        Route::view('all/users' , 'all_users')->name('all.users');
        Route::view('followers' , 'followers_list')->name('followers.list');
        Route::view('following' , 'following_list')->name('following.list');


        Route::get('post/detail/{id}' , 'PostController@postDetails')->name('post.details');
        Route::post('store/post' , 'PostController@store')->name('store.post');

        Route::get('update/profile' , function (){return view('update_profile');})->name('update.profile');
        Route::post('update/user/profile' , 'HomeController@UpdateProfile')->name('update.user.profile');

        Route::post('like-dislike/post' , 'PostController@LikeDislikePost')->name('like_dislike_post');

        Route::post('add/comment' , 'PostController@AddComment')->name('add_comment');
        Route::get('get/comment/{id}' , 'PostController@getComment')->name('get_comment');

        Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

        Route::post('follow/user' , 'PostController@followUser')->name('follow.user');
    }
);

Route::get('/home', 'HomeController@index')->name('home');