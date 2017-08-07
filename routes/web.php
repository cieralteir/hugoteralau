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

Route::get('/admin', 'Admin\PostController@index');
Route::post('/admin/post/store', 'Admin\PostController@store');
Route::post('/admin/comment/store', 'Admin\CommentController@store');

Route::get('/', 'PostController@index');
Route::post('/post/store', 'PostController@store');
Route::post('/comment/store', 'CommentController@store');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

/*Route::get('/hugot/lau/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');*/
