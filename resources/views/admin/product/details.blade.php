@extends('admin.master')

@section('title', 'Product Details')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center text-3xl font-bold">Product Details</h4>
                    <div class="table-responsive mt-4">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                <tr>
                                    <th class="text-start" style="width: 30%;">Product ID:</th>
                                    <td>{{ $product->id }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Product Name:</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Product Code:</th>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Product Model:</th>
                                    <td>{{ $product->model ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Category:</th>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Subcategory:</th>
                                    <td>{{ $product->subcategory->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Brand:</th>
                                    <td>{{ $product->brand->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Unit:</th>
                                    <td>{{ $product->unit->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Stock Amount:</th>
                                    <td>{{ $product->stock_amount }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Regular Price:</th>
                                    <td>{{ $product->regular_price }} Tk</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Selling Price:</th>
                                    <td>{{ $product->selling_price }} Tk</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Short Description:</th>
                                    <td>{{ $product->short_description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Long Description:</th>
                                    <td>{!! $product->long_description ?? 'N/A' !!}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Featured Image:</th>
                                    <td>
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}"
                                                style="height: 100px; width: 100px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">Additional Images:</th>
                                    <td>
                                        @if ($product->productImage->isNotEmpty())
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($product->productImage as $image)
                                                    <img src="{{ asset('storage/' . $image->image) }}"
                                                        alt="Additional Image"
                                                        style="height: 100px; width: 100px; object-fit: cover;">
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-muted">No Additional Images</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">Hit Count:</th>
                                    <td>{{ $product->hit_count }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Sales Count:</th>
                                    <td>{{ $product->sales_count }}</td>
                                </tr>
                                <tr>
                                    <th class="text-start">Featured Status:</th>
                                    <td>
                                        <span class="badge {{ $product->featured_status ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->featured_status ? 'Featured' : 'Not Featured' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">Publication Status:</th>
                                    <td>
                                        <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                            {{ $product->is_active ? 'Published' : 'Unpublished' }}
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-start">Actions:</th>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        @if ($product->is_active)
                                            <a href="{{ route('product.is_active', ['id' => $product->id]) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-eye-slash"></i> Unpublish
                                            </a>
                                        @else
                                            <a href="{{ route('product.is_active', ['id' => $product->id]) }}"
                                                class="btn btn-success btn-sm">
                                                <i class="fa-solid fa-eye"></i> Publish
                                            </a>
                                        @endif
                                        <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                            style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this product?')">
                                                <i class="fa fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
