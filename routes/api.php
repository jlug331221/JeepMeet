<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    return NULL;
});

Route::middleware('auth:sanctum')->group(function () {
    return NULL;
});

Route::apiResources([
    'threads' => 'API\Forum\ThreadController',
    'posts' => 'API\Forum\PostController',
]);

Route::get('recent-posts', 'API\Forum\PostController@recentPosts');
