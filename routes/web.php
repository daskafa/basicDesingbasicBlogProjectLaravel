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

// - ADMIN -

// Route::get('/panel', 'AdminController@index')->name('admin.dashboard');
Route::get('/login', 'AuthController@login')->middleware('isLogin')->name('admin.login');
Route::post('/login', 'AuthController@loginPost')->middleware('isLogin')->name('admin.login.post');

Route::get('/logout', 'AuthController@logout')->middleware('isAdmin')->name('logout');


Route::get('/', 'ArticleController@index')->middleware('isAdmin')->name('homepage');
//Create
Route::get('/create', 'ArticleController@create')->name('create');
Route::post('/createPost', 'ArticleController@createPost')->name('create.post');
//Update
Route::get('/update/{id}', 'ArticleController@update')->name('update');
Route::post('/updatepost/{id}', 'ArticleController@updatePost')->name('update.post');
//delete
Route::get('/deletepost/{id}', 'ArticleController@deletePost')->name('delete.post');
