<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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


Route::resource('posts', PostController::class);
Route::resource('comments', CommentController::class);

Route::get('/user/{user}', [ProfileController::class, 'getByUser'])->name('profile');
Route::get('/user/{user}/comments', [ProfileController::class, 'getByUser'])->name('userComments');

Route::post('/search', [PostController::class, 'search'])->name('search');

Route::get('/{id}/{slug}', [PostController::class, 'getByCategory'])
    ->name('category')
    ->where('id', ['[0-9]+']);

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
