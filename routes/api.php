<?php

use App\Http\Controllers\PostsController;
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

//public routes
Route::get('/posts', [PostsController::class , 'getPosts']);
Route::get('/posts/{slug}', [PostsController::class , 'getPost']);


//admin routes
Route::post('/create-post', 'PostsController@savePost');
Route::post('/update-post/{id}', 'PostsController@updatePost');
Route::post('/delete-post/{id}', 'PostsController@deletePost');

