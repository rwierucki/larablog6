<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index() {
//        $posts = Post::all();
//        return $posts = Post::latest('date')->toSql(); // zwraca zapytanie SQL
        $posts = Post::latest('date')->get();
        $posts_old = [
            (object)[
                'id' => 1,
                'title' => 'Test 1 - first text',
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
//    return view('pages.posts');
//    return view('pages.posts', ['posts' => $posts]);
        return view('pages.posts', compact('posts'));
    }
}
