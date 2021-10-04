<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        // uzytkownik musi byc zalogowany aby miec dostep do tego kotrolera 
        $this->middleware('auth');
        // sprawdzenie jakie ma uprawnienia dany uzytkownik - AuthServiceProvider.php
        $this->middleware('can:manage-post');
    }
    protected function validator($data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255',
            'type' => 'required|in:text,photo',
            'date' => 'nullable|date',
            'image' => 'nullable|image|max:2048',
            'content' => 'nullable',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // mozna usunąć jeśli się nie zmienia klasy bazowej
    }

    /**
     * Show the form for creating a new resource.
     *
     * //     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $data = $this->validator($request->all())->validate();
        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }
        $post = Post::create($data);;
        session()->flash('message', 'Post has been added!');

        return redirect(route('posts.single', $post->slug));


//        // 1 sposob zapisu //
//        Post::create([$tablicaZWartosciamiZFormularza]);
//        // 2 sposob zapisu //
//        $post = new Post($tablicaZWartosciamiZFormularza);
//        $post->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->validator($request->all())->validate();
        if (isset($data['image'])) {
            $path = $request->file('image')->store('photos');
            $data['image'] = $path;
        }
        $post->update($data);
        if (isset($data['image'])) {
            Storage::delete($oldImage);
        }

        return back()->with('message', 'The post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        Storage::delete($post->image);
        return redirect('/')->with('message', 'Post has been deleted!');
    }
}
