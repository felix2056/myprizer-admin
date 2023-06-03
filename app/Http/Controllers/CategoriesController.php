<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $category_editable = null;

        // check for optional query string
        if (request()->has('edit')) {
            $category_editable = Category::findOrFail(request()->edit);
        }

        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('categories', compact('categories', 'category_editable'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:categories',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully'); 
    }

    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'slug' => 'nullable|string|unique:categories,slug,' . $id,
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully'); 
    }

    public function destroy(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully'); 
    }
}
