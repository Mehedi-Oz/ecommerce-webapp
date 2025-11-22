@extends('website.master')

@section('title')
    Order Complete
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Order Complete</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i>Home</a></li>
                        <li><a href="{{ route('home') }}">Shop</a></li>
                        <li>Order Complete</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    @if (session('message'))
                        <h3 class="text-success">{{ session('message') }}</h3>
                    @else
                        <h3 class="text-danger">Something went wrong. Please try again.</h3>
                    @endif
                    <a href="{{ route('home') }}" class="btn btn-primary mt-4">Go to Home</a>
                </div>
            </div>
        </div>
    </section>
@endsection