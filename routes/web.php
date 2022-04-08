<?php

App::setlocale('en');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;




Auth::routes();
Route::post('/avatar/{id}', [App\Http\Controllers\ProfileController::class, 'store']);

if (Auth::routes()) {
    Route::get('/', function () {
        return view('home');
    })->name('home');
} else {
    Route::resource('/', PostsController::class);
}
Route::get('/friend-feed', [PostsController::class, 'friendFeed']);
Route::post('/friend-feed/upload/{id}', [PostsController::class, 'store']);
