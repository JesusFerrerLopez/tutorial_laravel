<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255|unique:posts',
            'category_id' => 'required|integer|exists:categories,id'
        ]);

        $data['user_id'] = auth()->id();

        $post = Post::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Post creado',
            'text' => 'El post se ha creado correctamente.',
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|integer|exists:categories,id',
            'excerpt' => 'nullable',
            'content' => 'nullable',
            'image' => 'nullable|image',
            'is_published' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {

            if ($post->img_path) {
                Storage::delete($post->img_path);
            }
            
            $data['img_path'] = Storage::put('posts', $request->image);
        }    

        $post->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Post actualizado',
            'text' => 'El post se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
