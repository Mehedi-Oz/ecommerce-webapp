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
        return view('admin.category.manage');
    }

    public function store(CategoryRequest $request) {
        $data = $request->validated();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imagepath = $image->store('categories', 'public');
            $data[$image] = $imagepath;
        }

        Category::create($data);
        return redirect()->route('category.manage')->with('success', 'Category created successfully.');
    }

    public function edit() {}

    public function update(CategoryRequest $request) {}

    public function destroy($request) {}
}
