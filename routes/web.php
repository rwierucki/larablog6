<?php
use App\Http\Controllers\PostController;
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

Route::get('/', [PostController::class, 'index']);
//Route::get('/posts/{id}', 'PostController@show');
//Route::get('/posts/{id}', [PostController::class, 'show2']);
//Route::get('/posts/{slug}', [PostController::class, 'show3']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.single'); // Route Model Binding //


Route::get('/about-me', function () {
    return view('pages.about');
})->name('about');
