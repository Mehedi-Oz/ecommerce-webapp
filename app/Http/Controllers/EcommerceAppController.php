<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceAppController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->take(8)->get(['id', 'category_id', 'name', 'selling_price', 'image']);
        return view('website.home.index', compact('products'));
    }

public function category($id)
{
    $products = Product::with('category')
        ->where('category_id', $id)
        ->where('is_active', true)
        ->orderBy('id', 'desc')
        ->get();

    return view('website.category.index', compact('products'));
}

    public function detail()
    {
        return view('website.detail.index');
    }
}
