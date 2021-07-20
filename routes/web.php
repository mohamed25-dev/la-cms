<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\PostController as AdminPostController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('admin/posts', AdminPostController::class);
Route::resource('admin/permissions', PermissionController::class);
Route::resource('pages', PageController::class);
Route::resource('comments', CommentController::class);
Route::resource('categories', CategoryController::class);
Route::resource('users', UserController::class);

Route::post('admin/roles', [RoleController::class, 'store'])->name('roles');
Route::post('admin/rolePermissions', [RoleController::class, 'getPermissionsByRole'])->name('getPermissionsByRole');

Route::get('/user/{user}', [ProfileController::class, 'getByUser'])->name('profile');
Route::get('/user/{user}/comments', [ProfileController::class, 'getByUser'])->name('userComments');

Route::get('settings', [ProfileController::class, 'settings'])->name('settings');
Route::put('settings', [ProfileController::class, 'updateProfile'])->name('settings');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('/search', [PostController::class, 'search'])->name('search');

Route::get('/{id}/{slug}', [PostController::class, 'getByCategory'])
    ->name('category')
    ->where('id', ['[0-9]+']);

Route::get('/', function () {
    return view('index');
});

