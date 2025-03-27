<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Mail\PostCreateMail;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    // Método que devuelve todos los posts
    public function index()
    {
        $posts =  Post::orderby('id', 'desc')->paginate();
        return view('posts.index', compact('posts'));
    }

    // Método que devuelve el formulario para crear un post
    public function create()
    {
        return view('posts.create');
    }

    // Método que guarda un post en la base de datos
    public function store(StorePostRequest   $request)
    {
        // $request->validate([
        //     'title' => 'required|min:3|max:255', 
        //     'content' => 'required',
        //     'slug' => ['required', 'min:3', 'max:255'],
        //     'category' => 'required'
        // ]);

        $post = Post::create($request->all());

        Mail::to('prueba@prueba.com')->send(new PostCreateMail($post));

        /*
            $post = new Post;

            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->category = $request->category;

            $post->save();
        */

        return redirect()->route('posts.index');
    }

    // Método que devuelve un post en concreto
    public function show(Post $post)
    {
        // $post  = Post::find($post);

        // compact('post') es lo mismo que ['post' => $post]
        return view('posts.show', compact('post'));
    }

    // Método de edición de posts
    public function edit(Request $request, Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3|max:255', 
            'content' => 'required',
            'slug' => ['required', 'min:3', 'max:255', "unique:posts,slug,{$post->id}"],
            'category' => 'required'
        ]);

        $post->update($request->all());

        /*
            $post->title = $request->title;
            $post->slug = $request->slug;
            $post->content = $request->content;
            $post->category = $request->category;

            $post->save();
        */
        return redirect()->route('posts.show', $post);  
    }

    // Método para eliminar un post
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index ');
    }
}
