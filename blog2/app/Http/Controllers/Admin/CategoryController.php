<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);

        Category::create($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Categoría creada',
            'text' => 'La categoría se ha creado correctamente.',
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, category $category)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:255',
        ]);

        $category->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Categoría actualizada',
            'text' => 'La categoría se ha actualizado correctamente.',
        ]);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(category $category)
    {

        $category->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Categoría eliminada',
            'text' => 'La categoría se ha eliminado correctamente.',
        ]);

        return redirect()->route('admin.categories.index');
    }
}
