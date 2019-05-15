<?php
Auth::routes();

Route::group(
    ['middleware' => 'auth'] ,
    function(){
        Route::view('profile' , 'profile');
        Route::view('all/users' , 'all_users');
        Route::view('gen' , 'generic');
        Route::view('ele' , 'elements');


        Route::get('index' , 'PostController@index')->name('index');
        Route::post('store/post' , 'PostController@store')->name('store.post');
    }
);

Route::get('/home', 'HomeController@index')->name('home');