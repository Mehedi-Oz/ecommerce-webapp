@extends('admin.master')

@section('title', 'Update Subcategory')

@section('content')

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <h4 class="card-title text-center text-3xl font-bold">Update Subcategory</h4>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Form -->
                    <form class="form-horizontal p-t-20" action="{{ route('subcategory.update', $subcategory->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Category Name Dropdown -->
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
                                            {{ old('category_id', $subcategory->category_id) == $category->id ? 'selected' : '' }}>
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
                            <label for="name" class="col-sm-3 control-label text-sm font-medium">
                                Subcategory Name <span class="text-danger">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="name" name="name" placeholder="Enter subcategory name" required
                                    value="{{ old('name', $subcategory->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Subcategory Description -->
                        <div class="form-group row mb-4">
                            <label for="description" class="col-sm-3 control-label text-sm font-medium">Subcategory
                                Description</label>
                            <div class="col-sm-9">
                                <textarea
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="description" name="description" rows="4" placeholder="Enter subcategory description">{{ old('description', trim($subcategory->description) === 'Not Given.' ? '' : $subcategory->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Publication Status -->
                        <div class="form-group row mb-4">
                            <label for="is_active" class="col-sm-3 control-label text-sm font-medium">Publication
                                Status</label>
                            <div class="col-sm-9">
                                <label class="me-3">
                                    <input type="radio" name="is_active" value="1"
                                        {{ old('is_active', $subcategory->is_active) == 1 ? 'checked' : '' }}>
                                    <span class="ms-2">Active</span>
                                </label>
                                <label>
                                    <input type="radio" name="is_active" value="0"
                                        {{ old('is_active', $subcategory->is_active) == 0 ? 'checked' : '' }}>
                                    <span class="ms-2">Inactive</span>
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
                                    Update Subcategory
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
