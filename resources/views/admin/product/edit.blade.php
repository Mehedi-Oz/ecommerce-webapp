@extends('admin.master')

@section('title', 'Edit Product')

@section('content')

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <h4 class="card-title text-center text-3xl font-bold">Edit Product</h4>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form -->
                    <form class="form-horizontal p-t-20" action="{{ route('product.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Category Name -->
                        <div class="form-group row mb-4">
                            <label for="category_id" class="col-sm-3 control-label text-sm font-medium">
                                Category Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    name="category_id" id="category_id" required>
                                    <option value="" disabled>-- Select Category --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Subcategory Name -->
                        <div class="form-group row mb-4">
                            <label for="subcategory_id" class="col-sm-3 control-label text-sm font-medium">
                                Subcategory Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    name="subcategory_id" id="subcategory_id" required>
                                    <option value="" disabled>-- Select Subcategory --</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}"
                                            {{ old('subcategory_id', $product->subcategory_id) == $subcategory->id ? 'selected' : '' }}>
                                            {{ $subcategory->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Brand Name -->
                        <div class="form-group row mb-4">
                            <label for="brand_id" class="col-sm-3 control-label text-sm font-medium">
                                Brand Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    name="brand_id" id="brand_id" required>
                                    <option value="" disabled>-- Select Brand --</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Unit Name -->
                        <div class="form-group row mb-4">
                            <label for="unit_id" class="col-sm-3 control-label text-sm font-medium">
                                Unit Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <select
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    name="unit_id" id="unit_id" required>
                                    <option value="" disabled>-- Select Unit --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_id', $product->unit_id) == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Name -->
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 control-label text-sm font-medium">
                                Product Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="name" name="name" placeholder="Enter product name" required
                                    value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Code -->
                        <div class="form-group row mb-4">
                            <label for="code" class="col-sm-3 control-label text-sm font-medium">
                                Product Code <span class="text-danger"> (must be unique)* </span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="code" name="code" placeholder="Enter product code" required
                                    value="{{ old('code', $product->code) }}">
                                @error('code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Model -->
                        <div class="form-group row mb-4">
                            <label for="model" class="col-sm-3 control-label text-sm font-medium">
                                Product Model
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="model" name="model" placeholder="Enter product model"
                                    value="{{ old('model', $product->model) }}">
                                @error('model')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Stock Amount -->
                        <div class="form-group row mb-4">
                            <label for="stock_amount" class="col-sm-3 control-label text-sm font-medium">
                                Stock Amount <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="number"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="stock_amount" name="stock_amount" placeholder="Enter stock amount" required
                                    value="{{ old('stock_amount', $product->stock_amount) }}">
                                @error('stock_amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Product Price -->
                        <div class="form-group row mb-4">
                            <label for="regular_price" class="col-sm-3 control-label text-sm font-medium">
                                Product Price <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <input type="number"
                                        class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                        id="regular_price" name="regular_price" placeholder="Regular price (taka)"
                                        required value="{{ old('regular_price', $product->regular_price) }}">
                                    <input type="number"
                                        class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                        id="selling_price" name="selling_price" placeholder="Selling price (taka)"
                                        required value="{{ old('selling_price', $product->selling_price) }}">
                                </div>
                                @error('regular_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                @error('selling_price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Short Description -->
                        <div class="form-group row mb-4">
                            <label for="short_description" class="col-sm-3 control-label text-sm font-medium">
                                Short Description
                            </label>
                            <div class="col-sm-9">
                                <textarea
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="short_description" name="short_description" rows="2" placeholder="Enter short description">{{ old('short_description', $product->short_description) }}</textarea>
                                @error('short_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Long Description -->
                        <div class="form-group row mb-4">
                            <label for="long_description" class="col-sm-3 control-label text-sm font-medium">
                                Long Description
                            </label>
                            <div class="col-sm-9">
                                <textarea
                                    class="form-control summernote bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="long_description" name="long_description" rows="5" placeholder="Enter long description">{{ old('long_description', $product->long_description) }}</textarea>
                                @error('long_description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Featured Image -->
                        <div class="form-group row mb-4">
                            <label class="col-sm-3 control-label text-sm font-medium">
                                Featured Image
                            </label>
                            <div class="col-sm-9">
                                <input type="file"
                                    class="dropify bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="image" name="image" accept="image/*"
                                    data-default-file="{{ $product->image ? asset('storage/' . $product->image) : '' }}">
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Other Images -->
                        {{-- <div class="form-group row mb-4">
                            <label class="col-sm-3 control-label text-sm font-medium">
                                Other Images
                            </label>
                            <div class="col-sm-9">
                                <input type="file"
                                    class="dropify bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="other_images" name="other_images[]" multiple accept="image/*">
                                @error('other_images.*')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div> --}}

                        <!-- Publication Status -->
                        <div class="form-group row mb-4">
                            <label for="is_active" class="col-sm-3 control-label text-sm font-medium">
                                Publication Status
                            </label>
                            <div class="col-sm-9">
                                <label class="me-3">
                                    <input type="radio" name="is_active" value="1"
                                        {{ old('is_active', $product->is_active) == 1 ? 'checked' : '' }}>
                                    <span class="ms-2">Published</span>
                                </label>
                                <label>
                                    <input type="radio" name="is_active" value="0"
                                        {{ old('is_active', $product->is_active) == 0 ? 'checked' : '' }}>
                                    <span class="ms-2">Unpublished</span>
                                </label>
                                @error('is_active')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success waves-effect waves-light text-white">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
