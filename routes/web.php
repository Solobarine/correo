<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Authentication
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');


// User Profile
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/settings', [UserController::class, 'edit'])->name('user.edit');
Route::patch('/user/{user}/settings/password', [UserController::class, 'updatePassword'])->name('user.update.password');
Route::patch('/user/{user}/settings/profile', [UserController::class, 'updateProfile'])->name('user.update.profile');
Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

// Posts Routes
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/new', [PostController::class, 'new'])->name('posts.new');
Route::get('/posts/post/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

// Likes Routes
Route::post('/posts/{post}/like', [LikesController::class, 'store'])->name('posts.like');
Route::delete('/posts/{post}/like', [LikesController::class, 'destroy']);

// Comments Routes
Route::post('/posts/{post}/comment', [CommentController::class, 'store'])->name('posts.comment');
Route::delete('/posts/{comment}/comment', [CommentController::class, 'destroy'])->name('posts.comment.destroy');