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

Route::get('/', function () {
    return view('index');
});


Route::get('/login','LoginController@showLoginForm');
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout')->middleware('auth');


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::post('/clear','HomeController@clear')->middleware('auth');

Route::resource('reset','ResetController',['only' => [
    'index', 'update'
]])->middleware('checkauth','auth');

Route::resource('siteconfig','SiteConfigController')->middleware('checkauth','auth');

Route::resource('menu','MenuController')->middleware('checkauth','auth');

Route::resource('nav','NavController')->middleware('checkauth','auth');

Route::resource('category','CategoryController')->middleware('checkauth','auth');

Route::resource('article','ArticleController')->middleware('checkauth','auth');

Route::resource('user','UserController')->middleware('checkauth','auth');

Route::resource('admin','AdminController')->middleware('checkauth','auth');

Route::post('authgroup/getauth','AuthGroupController@getauth')->middleware('auth');

Route::post('authgroup/updateauth','AuthGroupController@updateauth')->middleware('checkauth','auth')->name('updateauth');

Route::resource('authgroup','AuthGroupController')->middleware('checkauth','auth');

Route::resource('slide_category','SlideCategoryController')->middleware('checkauth','auth');

Route::resource('slide','SlideController')->middleware('checkauth','auth');

Route::resource('link','LinkController')->middleware('checkauth','auth');
