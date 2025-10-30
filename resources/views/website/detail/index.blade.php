@extends('website.master')

@section('title')
    {{ $product->name }}
@endsection

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">{{ $product->name }}</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="{{ route('product.category', ['id' => $product->category->id ?? '#']) }}">
                                {{ $product->category->name ?? 'Uncategorized' }}</a></li>
                        <li>{{ $product->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="item-details section">
        <div class="container">
            <div class="top-area">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-images">
                            <main id="gallery">
                                <div class="main-img">
                                    <img src="{{ asset('storage/' . $product->image) }}" id="current"
                                        alt="{{ $product->name }}">
                                </div>
                                <div class="images">
                                    @foreach ($product->productImage as $image)
                                        <img src="{{ asset('storage/' . $image->image) }}" class="img"
                                            alt="Additional Image">
                                    @endforeach
                                </div>
                            </main>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="product-info">
                            <h2 class="title">{{ $product->name }}</h2>
                            <p class="category"><i class="lni lni-tag"></i> Category:
                                <a href="{{ route('product.category', ['id' => $product->category->id ?? '#']) }}">
                                    {{ $product->category->name ?? 'Uncategorized' }}
                                </a>
                            </p>
                            <h3 class="price">${{ number_format($product->selling_price, 2) }}
                                <span>${{ number_format($product->regular_price, 2) }}</span>
                            </h3>
                            <p class="info-text">{{ $product->short_description }}</p>
                            <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 col-md-4 col-12">
                                        <div class="form-group quantity">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" id="quantity" name="quantity" class="form-control"
                                                value="1" min="1" max="10">
                                        </div>
                                    </div>
                                </div>
                                <div class="bottom-content">
                                    <div class="row align-items-end">
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="button cart-button">
                                                <button type="submit" class="btn px-5 form-control"
                                                    style="width: 100%;">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button type="button" class="btn"><i class="lni lni-reload"></i>
                                                    Compare</button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-12">
                                            <div class="wish-button">
                                                <button type="button" class="btn"><i class="lni lni-heart"></i> To
                                                    Wishlist</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-details-info">
                <div class="single-block">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="info-body custom-responsive-margin">
                                <h4>Details</h4>
                                <p>{!! $product->long_description !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="info-body">
                                <h4>Specifications</h4>
                                <ul class="normal-list">
                                    <li><span>Stock:</span> {{ $product->stock_amount }}</li>
                                    <li><span>Model:</span> {{ $product->model ?? 'N/A' }}</li>
                                    <li><span>Code:</span> {{ $product->code }}</li>
                                    <li><span>Brand:</span> {{ $product->brand->name ?? 'N/A' }}</li>
                                    <li><span>Unit:</span> {{ $product->unit->name ?? 'N/A' }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
