<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        $subcategories = Subcategory::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();
        $units = Unit::where('is_active', true)->get();

        return view('admin.product.index', compact('categories', 'subcategories', 'brands', 'units'));
    }

    public function getSubcategoryByCategory()
    {
        return response()->json(Subcategory::where('category_id', request('id'))->get());
    }

    public function manage()
    {
        $products = Product::all();

        return view('admin.product.manage', compact('products'));
    }

    public function details($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.product.details', compact('product'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $data['image'] = $image->store('products', 'public');
        }

        $product = Product::create($data);

        if ($request->hasFile('more_product_images')) {
            foreach ($request->file('more_product_images') as $additionalImage) {
                $imagePath = $additionalImage->store('products/more_images', 'public');
                $product->productImage()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return back()->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::with('productImage')->findOrFail($id);

        $categories = Category::where('is_active', true)->get();
        $subcategories = Subcategory::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();
        $units = Unit::where('is_active', true)->get();

        return view('admin.product.edit', compact('product', 'categories', 'subcategories', 'brands', 'units'));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            $image = $request->file('image');
            $data['image'] = $image->store('products', 'public');
        }

        $product->update($data);

        if ($request->hasFile('more_product_images')) {
            foreach ($request->file('more_product_images') as $additionalImage) {
                $imagePath = $additionalImage->store('products/more_images', 'public');
                $product->productImage()->create([
                    'image' => $imagePath,
                ]);
            }
        }

        return back()->with('success', 'Product updated successfully.');
    }

    public function is_active($id)
    {
        $product = Product::findOrFail($id);
        $product->is_active = !$product->is_active;
        $product->save();

        return back();
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && Storage::exists($product->image)) {
            Storage::delete($product->image);
        }

        foreach ($product->productImage as $image) {
            if (Storage::exists($image->image)) {
                Storage::delete($image->image);
            }
            $image->delete();
        }

        $product->delete();

        return back()->with('success', 'Product deleted successfully.');
    }
}
