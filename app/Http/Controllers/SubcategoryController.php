<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryRequest;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        return view('admin.subcategory.index', compact('categories'));
    }

    public function manage()
    {
        $subcategories = Subcategory::all();
        return view('admin.subcategory.manage', compact('subcategories'));
    }

    public function store(SubcategoryRequest $request)
    {
        $data = $request->validated();
        $data['description'] = $data['description'] ?? 'Not Given.';
        Subcategory::create($data);
        return redirect()->route('subcategory.add')->with('success', 'Subcategory created successfully.');
    }

    public function edit($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $categories = Category::where('is_active', true)->get();
        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(SubcategoryRequest $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $data = $request->validated();
        $subcategory->update($data);
        return back()->with('success', 'Subcategory updated successfully.');
    }

    public function is_active($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->is_active = !$subcategory->is_active;
        $subcategory->save();
        return back();
    }

    public function destroy($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        return back()->with('success', 'Subcategory deleted successfully.');
    }
}
