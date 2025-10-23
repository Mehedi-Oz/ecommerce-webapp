<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }

    public function manage()
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        if ($request->has('description')) {
            $data['description'] = $request->input('description') ?? 'Not given.';
        }

        Category::create($data);
        return redirect()->route('category.add')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->validated();
        $category->update($data);
        return back()->with('success', 'Category updated successfully.');
    }

    public function is_active($id)
    {
        $category = Category::findOrFail($id);
        $category->is_active = !$category->is_active;
        $category->save();
        return back();
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully.');
    }
}
