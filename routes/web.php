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

Route::get('/', ShowWelcomeController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified', 'auth');

Route::resource('/news', NewsController::class);
Route::get('/about', ShowAboutController::class);

Route::get('/forum', ShowForumController::class);

Route::get('/contact', [
  'uses' => 'ContactUsMessageController@index'
]);

Route::post('/contact', [
  'uses' => 'ContactUsMessageController@submitEmailAndPersistMessage'
]);

require __DIR__.'/auth.php';

// The following is needed to use Laravel and Vue Routing without the hash in the URL.
// This also allows a page refresh in the admin dashboard without getting a 404 error page.
// Route::get('{path}', 'ShowForumController')->where('path', '.*');