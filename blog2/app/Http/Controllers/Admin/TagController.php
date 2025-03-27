<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags'
        ]);

        Tag::create($request->all());

        session()->flash('swal', [
            'type' => 'success',
            'title' => '¡Tag creado!',
            'text' => 'El tag se ha creado correctamente.'
        ]);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id
        ]);

        $tag->update($request->all());

        session()->flash('swal', [
            'type' => 'success',
            'title' => '¡Tag actualizado!',
            'text' => 'El tag se ha actualizado correctamente.'
        ]);

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('swal', [
            'type' => 'success',
            'title' => '¡Tag eliminado!',
            'text' => 'El tag se ha eliminado correctamente.'
        ]);

        return redirect()->route('admin.tags.index');
    }
}
