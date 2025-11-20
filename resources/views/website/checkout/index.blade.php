@extends('website.master')

@section('title')
    Details
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1">
                        <ul id="accordionExample">
                            <li class="nav nav-pills">
                                <a href="" class="nav-link active" data-bs-target="#cash" data-bs-toggle="pill">Cash
                                    On Delivery</a>
                                <a href="" class="nav-link" data-bs-target="#online" data-bs-toggle="pill">Online</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="cash">

                                <form action="{{ route('cash-on-delivery') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Name</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Email Address" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="text" placeholder="Phone Number" name="phone">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Delivery Address</label>
                                                <div class="form-input form">
                                                    <textarea id="" placeholder="Delivery Address" name="delivery_address"
                                                        style="padding-top: 10px; height: 70px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Payment Type</label>
                                                <div class="">
                                                    <label for="">
                                                        <input type="radio" checked name="payment_type" value="1"
                                                            class="me-2">Cash On Delivery
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="single-checkbox checkbox-style-3">
                                                <input type="checkbox" id="checkbox-3" checked>
                                                <label for="checkbox-3"><span></span></label>
                                                <p>I accept all terms and conditions.</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="single-form button">
                                                <button type="submit" class="btn">Confirm Order</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>

                            <div class="tab-pane fade show active" id="online">



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title mb-3">Shopping Cart</h5>
                            <div class="cart-summary">
                                @php($subTotal = round((float) str_replace(',', '', Cart::subtotal())))
                                @php($tax = round($subTotal * 0.15))
                                @php($shipping = 120)
                                @php($totalPayable = $subTotal + $tax + $shipping)

                                @foreach (Cart::content() as $cartItem)
                                    <div
                                        class="cart-item d-flex justify-content-between align-items-center py-1 border-bottom">
                                        <span class="cart-item-name">{{ $cartItem->name }} ({{ $cartItem->qty }}x)</span>
                                        <span class="cart-item-price">{{ number_format($cartItem->subtotal, 2) }}
                                            taka</span>
                                    </div>
                                @endforeach

                                <div class="cart-subtotal d-flex justify-content-between align-items-center mt-3">
                                    <span class="subtotal-label">Subtotal:</span>
                                    <span class="subtotal-value">{{ number_format($subTotal, 2) }} taka</span>
                                </div>

                                <div class="cart-tax d-flex justify-content-between align-items-center mt-2">
                                    <span class="tax-label">Tax (15%):</span>
                                    <span class="tax-value">{{ number_format($tax, 2) }} taka</span>
                                </div>

                                <div class="cart-shipping d-flex justify-content-between align-items-center mt-2">
                                    <span class="shipping-label">Shipping:</span>
                                    <span class="shipping-value">{{ number_format($shipping, 2) }} taka</span>
                                </div>
                            </div>

                            <div class="cart-total d-flex justify-content-between align-items-center mt-3 border-top pt-2">
                                <span class="total-label fw-bold">Total Payable:</span>
                                <span class="total-value fw-bold">{{ number_format($totalPayable, 2) }} taka</span>
                            </div>

                            <?php
                            Session::put('order_total', $totalPayable);
                            Session::put('tax_total', $tax);
                            Session::put('shipping_total', $shipping);
                            ?>

                            <div class="price-table-btn button mt-4">
                                <a href="javascript:void(0)" class="btn btn-alt w-100">Checkout</a>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="#">
                                <img src="{{ asset('/') }}website/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
