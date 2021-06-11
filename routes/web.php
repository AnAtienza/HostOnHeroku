<?php

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

// Changing this for Sprint 4
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');


// Diwa added this for community guidelines
Route::get('/guidelines', function () {
    return view('guidelines');
});

Auth::routes();
// Start of Middleware group for Sprint 5
Route::middleware([\App\Http\Middleware\ActiveUser::class, \App\Http\Middleware\Authenticate::class])->group(function(){

	Route::get('/', [App\Http\Controllers\PostsController::class, 'index'])->name('posts.index');

	Route::get('/home', [App\Http\Controllers\ProfilesController::class, 'index'])->name('home');

	// Route for follow button Sprint 4
	Route::post('/follow/{user}', [App\Http\Controllers\FollowsController::class, 'store'])->name('follows.store');

	Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create'])->name('posts.create');

	Route::post('/p', [App\Http\Controllers\PostsController::class, 'store'])->name('posts.store');

	Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show'])->name('posts.show');

	// Diwa adding delete
	Route::delete('/p/delete/{post}', [App\Http\Controllers\PostsController::class, 'delete'])->name('posts.delete');
	// End of Diwa adding delete
});

Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index_with_input'])->name('profile.show');

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit'])->name('profile.edit');

// Added Ban User for Sprint 5
Route::get('/profile/{user}/ban', [App\Http\Controllers\ProfilesController::class, 'ban'])->name('profile.ban');

// Added Suspend User for Sprint 5
Route::get('/profile/{user}/suspend', [App\Http\Controllers\ProfilesController::class, 'suspend'])->name('profile.suspend');

// currently working on this one
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update'])->name('profile.update');

// Auth::routes();

// Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index_with_input'])->name('profile.show');

// Auth::routes();

// Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index_with_input'])->name('profile.show');