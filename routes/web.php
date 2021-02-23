<?php

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
    $post = [
        (object)[
            'id' => 1,
            'title' => 'Test 1',
            'content' => '<b>Test bold</b> cos innego Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa dolor eos error esse exercitationem expedita id in nesciunt nihil numquam optio, perferendis qui ut vero! Asperiores incidunt quod tempore?',
            'date' => '2021-02-02',
            'type' => 'text',
            'image' => null
        ],
        (object)[
            'id' => 2,
            'title' => 'Test photo ',
            'content' => '<b>Test bold</b> cos innego Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto culpa dolor eos error esse exercitationem expedita id in nesciunt nihil numquam optio, perferendis qui ut vero! Asperiores incidunt quod tempore?',
            'date' => '2021-02-02',
            'type' => 'photo',
            'image' => '/images/image-01.jpg'
        ],

    ];
    return view('pages.posts');
});

Route::get('/about-me', function () {
    return view('pages.about');
})->name('about');
