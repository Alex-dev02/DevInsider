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

Route::get('/', function(){
  return redirect("/home");
});
Route::get('/blogposts/{id}', 'BlogPostsController@show');
Route::get('/blog', 'BlogPostsController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/lessons/{id}', 'LessonsController@show');
Route::get('/problems/{id}', 'ProblemsController@show');
Route::post('/problems', 'ProblemsController@store');
