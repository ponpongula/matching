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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
  Route::get('idea/create', 'Admin\IdeaController@add');
  Route::post('idea/create', 'Admin\IdeaController@create');

  Route::get('idea', 'Admin\IdeaController@index');

  Route::get('idea/edit','Admin\IdeaController@edit');
  Route::post('idea/edit','Admin\IdeaController@update');
  Route::get('idea/delete','Admin\IdeaController@delete');
  Route::get('idea/mypage','Admin\IdeaController@mypage');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IdeaController@index');
