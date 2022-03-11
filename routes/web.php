<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentController;
use App\Http\Controllers\CommentCommentController;
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

Route::post('newsletter', function () {
    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us14'
    ]);
    try {
        $response = $mailchimp->lists->addListMember('eaf8b52ea1', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch(\Exception $e) {
        return redirect('/')->with('error', 'This email could not be added to our newsletter list');
    }

    return redirect('/')->with('message', 'You are now signed up for our newsletter');
});

// Posts
Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/posts/{post}', [PostController::class, 'show']);

//Register
Route::get('register', [RegisterController::class, 'create'])->middleWare('guest');
Route::post('register', [RegisterController::class, 'store'])->middleWare('guest');

//Login
Route::get('login', [SessionsController::class, 'create'])->middleWare('guest');
Route::post('login', [SessionsController::class, 'store'])->middleWare('guest');

//Logout
Route::post('logout', [SessionsController::class, 'destroy'])->middleWare('auth');

//Comments
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);
