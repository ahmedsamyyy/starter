<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['verify'=>true]);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::get('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index']);
Route::get('/posts/create', [App\Http\Controllers\PostController::class,'create'])->name('post.create');
Route::post('/posts/store', [App\Http\Controllers\PostController::class,'store'])->name('post.store');
Route::post('/post/{id}', [App\Http\Controllers\PostController::class,'edit'])->name('post.edit');
Route::post('/post/update/{id}', [App\Http\Controllers\PostController::class,'update'])->name('post.update');
Route::get('/post/{id}', [App\Http\Controllers\PostController::class,'destroy'])->name('post.destroy');
Route::get('post/show/slug', [App\Http\Controllers\PostController::class,'show'])->name('post.show');
//tags
Route::get('/tags', [App\Http\Controllers\TagController::class, 'index'])->name('tags');
Route::get('/tag', [App\Http\Controllers\TagController::class, 'index'])->name('tag');
Route::get('/tag', [App\Http\Controllers\TagController::class, 'index']);
Route::get('/tag/create', [App\Http\Controllers\TagController::class,'create'])->name('tag.create');
Route::post('/tag/store', [App\Http\Controllers\TagController::class,'store'])->name('tag.store');
Route::post('/tag/{id}', [App\Http\Controllers\TagController::class,'edit'])->name('tag.edit');
Route::post('/tag/update/{id}', [App\Http\Controllers\TagController::class,'update'])->name('tag.update');
Route::get('/tag/{id}', [App\Http\Controllers\TagController::class,'destroy'])->name('tag.destroy');
//CAARS
Route::get('/cars', [App\Http\Controllers\CarController::class, 'index'])->name('cars.index');
Route::get('/cars/create', [App\Http\Controllers\CarController::class, 'create'])->name('cars.create');
Route::post('/cars/store', [App\Http\Controllers\CarController::class, 'store'])->name('cars.store');
Route::get('/cars/edit/{id}', [App\Http\Controllers\CarController::class,'edit'])->name('cars.edit');
Route::post('/cars/update/{id}', [App\Http\Controllers\CarController::class,'update'])->name('cars.update');
Route::get('/cars/{id}', [App\Http\Controllers\CarController::class, 'destroy'])->name('cars.destroy');


Route::get('/rests', [App\Http\Controllers\ResturantController::class, 'index'])->name('rests.index');
Route::get('/rests/create', [App\Http\Controllers\ResturantController::class, 'create'])->name('rests.create');
Route::post('/rests/store', [App\Http\Controllers\ResturantController::class, 'store'])->name('rests.store');
Route::get('/rests/edit/{id}', [App\Http\Controllers\ResturantController::class, 'edit'])->name('rests.edit');
Route::post('/rests/update/{id}', [App\Http\Controllers\ResturantController::class, 'update'])->name('rests.update');
Route::get('/rests/{id}', [App\Http\Controllers\ResturantController::class, 'destroy'])->name('rests.destroy');
