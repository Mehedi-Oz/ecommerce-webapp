<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

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
}


