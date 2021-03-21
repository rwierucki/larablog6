<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin;

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


//Auth::routes(); //  sprawdzenie URI dla auth ->  php artisan route:list
Auth::routes(['verify' => "true"]); //  dodanie weryfikacji użytkownika

Route::get('/admin/post/create', [Admin\PostController::class, 'create'])->name('admin.post.create');
Route::post('/admin/post/create', [Admin\PostController::class, 'store']);
Route::get('/admin/post/{id}', [Admin\PostController::class, 'edit'])->name('admin.post.edit');
Route::put('/admin/post/{id}', [Admin\PostController::class, 'update']);
Route::delete('/admin/post/{id}', [Admin\PostController::class, 'destroy'])->name('admin.post.delete');
