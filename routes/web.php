<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/blog', 'PagesController@blog');
Route::get('/', 'PagesController@home');
Route::get('/blogtest', function(){
  return view('pages.blogtest');
});
Route::resource('blogposts', 'BlogPostsController');
