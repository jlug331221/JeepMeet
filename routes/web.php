<?php

use App\Http\Controllers\ContactUsMessageController;
use App\Http\Controllers\HomeController;
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

Route::get('/', ShowWelcomeController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified', 'auth');

Route::resource('/news', NewsController::class);

Route::get('/about', ShowAboutController::class);

Route::get('/forum', ShowForumController::class);

Route::get('/contact', [ContactUsMessageController::class, 'index']);

Route::post('/contact', [ContactUsMessageController::class, 'submitEmailAndPersistMessage']);

require __DIR__ . '/auth.php';
