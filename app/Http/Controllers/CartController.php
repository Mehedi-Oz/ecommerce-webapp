<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::content();
        return view('website.cart.index', compact('cartItems'));
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $product = Product::with('category', 'brand')->findOrFail($id);

        $cartItem = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        })->first();

        $currentCartQty = $cartItem ? $cartItem->qty : 0;

        if (($currentCartQty + $request->quantity) > $product->stock_amount) {
            return redirect()->route('cart.show')->with('error', 'Cannot add more than available stock!');
        }

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->selling_price,
            'weight' => 0,
            'options' => [
                'image' => $product->image,
                'category' => $product->category->name ?? 'Uncategorized',
                'brand' => $product->brand->name ?? 'No Brand',
            ]
        ]);

        return redirect()->route('cart.show')->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->quantity);
        return redirect()->route('cart.show')->with('success', 'Cart updated successfully!');
    }

    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->route('cart.show')->with('success', 'Item removed from cart successfully!');
    }

    public function clear()
    {
        Cart::destroy();
        return redirect()->route('cart.show')->with('success', 'Cart cleared successfully!');
    }
}
