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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified', 'auth');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::view('/news', 'news');
Route::view('/about', 'about');

Route::get('forum', 'ShowForumController')->name('forum');

Route::get('/contact', [
  'uses' => 'ContactUsMessageController@index'
]);

Route::post('/contact', [
  'uses' => 'ContactUsMessageController@submitEmailAndPersistMessage'
]);

// The following is needed to use Laravel and Vue Routing without the hash in the URL.
// This also allows a page refresh in the admin dashboard without getting a 404 error page.
Route::get('{path}', 'ShowForumController')->where('path', '.*');