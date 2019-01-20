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
    return view('welcome');
});

Auth::routes();

Route::view('/join', '/auth/join');
Route::view('/login', '/auth/login');

Route::view('/profile', 'home');

Route::view('/forum', 'forum');
Route::view('/news', 'news');
Route::view('/about', 'about');
//Route::view('/contact', 'contact');

Route::get('/contact', [
    'uses' => 'ContactMessageController@index'
]);

Route::post('/contact', [
    'uses' => 'ContactMessageController@store',
    'as' => 'contact/store'
]);