<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [PostController::class, 'index'])->name('home');

Route::resource('pages', PageController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::resource('permissions', PermissionController::class);

    Route::get('/posts', [AdminPostController::class, 'index'])->name('all');
    Route::post('roles', [RoleController::class, 'store'])->name('roles');
    Route::post('rolePermissions', [RoleController::class, 'getPermissionsByRole'])->name('getPermissionsByRole');
});

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('admin');

Route::get('user/{user}', [ProfileController::class, 'getByUser'])->name('profile');
Route::get('user/{user}/comments', [ProfileController::class, 'getByUser'])->name('userComments');

Route::get('settings', [ProfileController::class, 'settings'])->name('settings');
Route::put('settings', [ProfileController::class, 'updateProfile'])->name('settings');


Route::post('search', [PostController::class, 'search'])->name('search');
Route::get('/{id}/{slug}', [PostController::class, 'getByCategory'])
    ->name('category');



