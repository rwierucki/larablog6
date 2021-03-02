<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
//        $posts = Post::all();
//        return $posts = Post::latest('date')->toSql(); // zwraca zapytanie SQL
//        $posts = Post::latest('date')->get();
//        $posts = Post::latest('date')->skip(3)->limit(3)->get();
        $posts = Post::latest('date')->paginate(3);

//    return view('pages.posts');
//    return view('pages.posts', ['posts' => $posts]);
        return view('pages.posts', compact('posts'));
    }

    public function show2($id)
    {
//        $post = Post::where('id', $id)->first(); // pierwszy sposób pobrania jednego elementu // first() - zwraca model
//        $post = Post::find($id);
//      // jesli nie ma posta to zwaraca null
//        if (is_null($post)) return abort(404); // zwraca 404
        // dobre rozwiazanie
        $post = Post::findOrFail($id);
        return view('pages.post', compact('post'));
    }

    public function show3($slug)
    {
//        $post = Post::where('slug', $slug)->firstOrFail();
        $post = Post::whereSlug($slug)->firstOrFail();
        return view('pages.post', compact('post'));
    }

    // Route Model Binding // slug -> dodać do modelu getRouteKeyName
    public function show(Post $post)
    {
        return view('pages.post', compact('post'));
    }


}
