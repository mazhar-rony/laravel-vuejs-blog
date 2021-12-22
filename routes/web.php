<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;

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
    //return view('welcome');
    return view('public.index');
});

Auth::routes();

//Route::get('/{anypath}', [App\Http\Controllers\HomeController::class, 'index'])->where('path', '.*');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('category', CategoryController::class);

    Route::resource('post', PostController::class);
});

Route::get('/blogpost', [BlogController::class, 'allBlogPost']);
Route::get('/singlepost/{id}', [BlogController::class, 'getPostById']);
Route::get('/categories', [BlogController::class, 'getAllCategory']);
Route::get('/latestposts', [BlogController::class, 'getLatestPosts']);
Route::get('/categorypost/{id}', [BlogController::class, 'getPostsByCategory']);
Route::get('/categorypost/{id}', [BlogController::class, 'getPostsByCategory']);
Route::get('/search', [BlogController::class, 'getSearchPosts']);


