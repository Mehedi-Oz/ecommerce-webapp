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

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Name</label>
                                            <div class="row">
                                                <div class="col-md-6 form-input form">
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
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
                                                <textarea id="" placeholder="Delivery Address" name="delivery_address"></textarea>
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

                            </div>

                            <div class="tab-pane fade show active" id="online">



                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-price-table">
                            <h5 class="title">Shopping Cart</h5>
                            <div class="sub-total-price">
                                @foreach (Cart::content() as $cartItem)
                                    <div class="total-price">
                                        <p class="value">{{ $cartItem->name }} ({{ $cartItem->qty }}x)</p>
                                        <p class="price">{{ $cartItem->subtotal }} taka</p>
                                    </div>
                                @endforeach
                                <div class="total-price">
                                    <p class="value">Subtotal:</p>
                                    <p class="price">{{ Cart::subtotal() }} taka</p>
                                </div>
                                <div class="total-price">
                                    <p class="value">Tax (15%):</p>
                                    <p class="price">
                                        {{ number_format((float) str_replace(',', '', Cart::subtotal()) * 0.15, 2) }} taka
                                    </p>
                                </div>
                                <div class="total-price">
                                    <p class="value">Shipping:</p>
                                    <p class="price">120 taka</p>
                                </div>
                            </div>
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Payable:</p>
                                    <p class="price">
                                        {{ number_format((float) str_replace(',', '', Cart::subtotal()) * 1.15 + 120, 2) }}
                                        taka
                                    </p>
                                </div>
                            </div>
                            <div class="price-table-btn button">
                                <a href="javascript:void(0)" class="btn btn-alt">Checkout</a>
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
