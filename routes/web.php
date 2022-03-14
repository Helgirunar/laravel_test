<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\CommentCommentController;
use App\Http\Controllers\NewsletterController;
use App\Services\Newsletter;
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

Route::get('/laravel', function () {
    return view('laravel');
});

//Newsletter
Route::post('newsletter', NewsletterController::class);

//Register
Route::get('register', [RegisterController::class, 'create'])->middleWare('guest');
Route::post('register', [RegisterController::class, 'store'])->middleWare('guest');

//Login
Route::get('login', [SessionsController::class, 'create'])->middleWare('guest');
Route::post('login', [SessionsController::class, 'store'])->middleWare('guest');

//----Auth----

// Posts
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show']);

//Comments
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

//Logout
Route::post('logout', [SessionsController::class, 'destroy'])->middleWare('auth');

//Admin
Route::get('admin/dashboard',[SessionsController::class, 'show'])->middleware('auth');
Route::get('admin/posts/{post:id}/edit' ,[AdminPostController::class, 'edit'])->middleware('admin');

Route::get('admin/posts/create',[AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::patch('admin/posts/{post:id}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post:id}', [AdminPostController::class, 'destroy'])->middleware('admin');
