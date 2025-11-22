<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\CartItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private $customer, $order;

    public function index()
    {
        return view('website.checkout.index');
    }

    public function cashOnDelivery(Request $request)
    {
        if (Cart::count() == 0) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty!');
        }

        $this->customer = $this->createCustomer($request);

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        $this->order = $this->createOrder($request);

        $this->saveOrderDetails();

        Cart::destroy();

        Session::forget(['order_total', 'tax_total', 'shipping_total']);

        return redirect()->route('order-complete')->with('message', 'Your order has been placed successfully!');
    }

    private function createCustomer(Request $request): Customer
    {
        $customerData = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->phone,
            'password' => bcrypt('defaultpassword'),
            'address' => $request->delivery_address,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $customerData['image'] = $image->store('customers', 'public');
        }

        return Customer::create($customerData);
    }

    private function createOrder(Request $request): Order
    {
        $orderData = [
            'customer_id' => $this->customer->id,
            'order_date' => now()->toDateString(),
            'order_timestamp' => now(),
            'order_total' => Session::get('order_total'),
            'tax_total' => Session::get('tax_total'),
            'shipping_total' => Session::get('shipping_total'),
            'delivery_address' => $request->delivery_address,
            'payment_type' => $request->payment_type == '1' ? 'Cash On Delivery' : $request->payment_type,
            'order_status' => 'pending',
            'delivery_status' => 'pending',
            'payment_status' => 'pending',
            'currency' => 'BDT',
        ];

        return Order::create($orderData);
    }

    private function saveOrderDetails(): void
    {
        /** @var CartItem $cartItem */
        foreach (Cart::content() as $cartItem) {
            $this->order->orderDetails()->create([
                'product_id' => (int) $cartItem->id,
                'product_name' => (string) $cartItem->name,
                'product_quantity' => (int) $cartItem->qty,
                'product_price' => (float) $cartItem->price,
            ]);
        }
    }

    public function orderComplete()
    {
        return view('website.checkout.order-complete');
    }
}