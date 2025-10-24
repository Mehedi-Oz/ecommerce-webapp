<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.index');
    }

    public function manage()
    {
        $brands = Brand::all();
        return view('admin.brand.manage', compact('brands'));
    }

    public function store(BrandRequest $request)
    {
        // dd($request->all());
        $data = $request->validated();
        $data['description'] = $data['description'] ?? 'Not Given.';

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = $image->store('brands', 'public');
        }

        Brand::create($data);
        return redirect()->route('brand.add')->with('success', 'Brand created successfully.');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $data = $request->validated();

        if ($request->hasFile('image')) {
             if ($brand->image && Storage::disk('public')->exists($brand->image)) {
                Storage::disk('public')->delete($brand->image);
            }
            $image = $request->file('image');
            $data['image'] = $image->store('brands', 'public');
        }

        $brand->update($data);
        return back()->with('success', 'Brand updated successfully.');
    }

    public function is_active($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->is_active = !$brand->is_active;
        $brand->save();
        return back();
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        if ($brand->image && Storage::exists($brand->image)) {
            Storage::delete($brand->image);
        }

        $brand->delete();
        return back()->with('success', 'Brand deleted successfully.');
    }
}