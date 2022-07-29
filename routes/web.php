<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



// Route::get('/', function () {
//     return view('guests.home');
// })->name('home');

Auth::routes();

// Route::get('/admin', 'Admin\AdminController@index')->name('admin');
// Route::resource('posts', 'Admin\PostController');

Route::middleware('auth')
   ->namespace('Admin')
   ->name('admin.')
   ->prefix('admin')
   ->group(function () {
        Route::get('/', 'AdminController@dashboard')->name('dashboard');
        Route::get('users', 'UserController@index')->name('users.index');
        Route::resource('categories', 'CategoryController');
        Route::resource('posts', 'PostController');
        Route::get('my-posts', 'PostController@myIndex')->name('posts.myIndex');
        Route::resource('tags', 'TagController');

   });

//per gestire le rotte di vue eliminiamo la rotta principale della home in alto e mettiamo questo
   Route::get("{any?}", function(){
    return view('guests.home');
   })->where("any", ".*")->name('home');
