<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::get();

        return view('admin.category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'isActive' => 'required',
        ]);

        $category = new Category;
        $category->name = $data['name'];
        $category->isActive = $data['isActive'];
        $category->save();

        session()->flash('success', 'Data Create successfully.');

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $data = $category;
        return view('admin.category.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('categories')->ignore($category->id),
                ],
            'isActive' => 'required',
        ]);

        $category = Category::findOrFail($category->id);
        $category->name = $data['name'];
        $category->isActive = $data['isActive'];
        $category->save();

        session()->flash('success', 'Data Update successfully.');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Date deleted successfully.');

        return redirect()->route('category.index');
    }
}
