<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostController;
use App\Http\Controllers\Pages\AuthorController;
use App\Http\Controllers\Pages\CommentController;
use App\Http\Controllers\Stripe\PaymentController;
use App\Http\Controllers\Pages\MembershipController;
use App\Http\Controllers\Dashboard\BillingController;

require 'admin.php';

Route::get('/', HomeController::class)->name('home');
Route::get('/membership', [MembershipController::class, 'index'])->name('membership');


Route::get('/users', [UserController::class, 'index'])->name('users');

Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/billing', [BillingController::class, 'index'])->name('billing');
});


/* Name: Authors
 * Url: /authors/*
 * Route: authors.*
*/
Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('/{user:name}', [AuthorController::class, 'show'])->name('show');
});

/* Name: Posts
 * Url: /posts/*
 * Route: posts.*
*/
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{post}', [PostController::class, 'show'])->name('show');
});

/* Name: Tags
 * Url: /tags/*
 * Route: tags.*
*/
Route::group(['prefix' => 'tags', 'as' => 'tags.'], function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::get('/{tag}', [TagController::class, 'show'])->name('show');
});


/* Name: comments
 * Url: /comments/*
 * Route: comments.*
*/
Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
    Route::post('/', [CommentController::class, 'store'])->name('store');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
