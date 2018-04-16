<?php

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

Route::get('/test', function(){
	return \DB::select("select * from regions");
});

Route::get('/', function () {
  return view('welcome');
});

Route::get('employee', 'EmployeeController@index');

Route::get('array-shift', function(){
  $input = array("red", "green", "blue", "yellow");
  print_r($input);
  echo "<br>";
  array_splice($input, -1, 1, array("black", "maroon"));
  print_r($input);
});

Route::resource('posts', 'PostController');

Route::post('search', 'PostController@search');

Route::resource('articles', 'ArticleController');

Route::post('article-search', 'ArticleController@search');

Auth::routes();

Route::get('/home', 'HomeController@index');
