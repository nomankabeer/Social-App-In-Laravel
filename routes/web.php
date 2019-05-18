<?php
Auth::routes();

Route::group(
    ['middleware' => 'auth'] ,
    function(){
        Route::view('profile' , 'profile')->name('profile');
        Route::view('gen' , 'generic');
        Route::view('ele' , 'elements');
        Route::view('add/post' , 'add_post')->name('add.post');

        Route::view('all/users' , 'all_users')->name('all.users');
        Route::view('followers' , 'followers_list')->name('followers.list');
        Route::view('following' , 'following_list')->name('following.list');


        Route::get('post/detail/{id}' , 'PostController@postDetails')->name('post.details');
        Route::get('index' , 'PostController@index')->name('index');
        Route::post('store/post' , 'PostController@store')->name('store.post');

        Route::get('update/profile' , function (){return view('update_profile');})->name('update.profile');
        Route::post('update/user/profile' , 'HomeController@UpdateProfile')->name('update.user.profile');
    }
);

Route::get('/home', 'HomeController@index')->name('home');