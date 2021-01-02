<?php

use App\Http\Controllers\HomeController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified', 'auth');

Route::get('logout', 'Auth\LoginController@logout');

Route::view('/events', 'jeepmeetevents');
Route::view('/news', 'news');
Route::view('/about', 'about');

Route::get('forum', 'ShowForumController')->name('forum');

Route::get('/contact', [
  'uses' => 'ContactUsMessageController@index'
]);

Route::post('/contact', [
  'uses' => 'ContactUsMessageController@submitEmailAndPersistMessage'
]);

// The following route also allows a page refresh in the forum page (Vue app) 
// without getting a 404 error page.
Route::get('/{path?}', 'ShowForumController')->where('path', '^(?!api).*$');