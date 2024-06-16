<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostsController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::prefix('posts')->group(function () {
        Route::get('/', [PostsController::class, 'index'])->name('posts.all');
        Route::get('/create', [PostsController::class, 'create'])->name('posts.create');
        Route::post('/save', [PostsController::class, 'store'])->name('posts.store');
        Route::get('/{permalink}/edit', [PostsController::class, 'edit'])->name('posts.edit');
        Route::patch('/update/id={id}', [PostsController::class, 'update'])->name('posts.update');
        Route::get('/delete/id={id}', [PostsController::class, 'destroy'])->name('posts.delete');
    });

    Route::get('comments', [UserController::class, 'comm'])->name('comments');
    Route::get('comment/delete/id={id}', [UserController::class, 'delComm'])->name('comment.delete');

});

Route::middleware(['web'])->group(function () {
    Route::post('/logout', [UserController::class, 'signout'])->name('logout');
});

Route::get('/', [LandingController::class, 'index'])->name('welcome');
Route::get('/{permalink}', [LandingController::class, 'homePost'])->name('post-details');
Route::get('/author/{author_id}', [LandingController::class, 'getAuthor'])->name('author');
Route::post('/comment', [LandingController::class, 'postComment'])->name('post-comment');
Route::get('/like-post/{post_id}', [LandingController::class, 'likePost'])->name('like-post');
Route::post('/search-post', [LandingController::class, 'searchPost'])->name('search-post');
