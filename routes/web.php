<?php

Route::view('profile' , 'profile');
Route::view('all/users' , 'all_users');
Route::view('gen' , 'generic');
Route::view('ele' , 'elements');


Route::get('/home' , 'PostController@index')->name('home');
Route::post('store/post' , 'PostController@store')->name('store.post');