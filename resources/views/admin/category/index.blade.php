@extends('admin.master')

@section('title', 'Add Category')

@section('content')

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <!-- Header -->
                    <h4 class="card-title text-center text-3xl font-bold">Add A Product Category</h4>
                    <p class="text-success text-center">{{ session('message') }}</p>

                    <!-- Form -->
                    <form class="form-horizontal p-t-20" action="{{ route('category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Category Name -->
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 control-label text-sm font-medium">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="name" name="name" placeholder="Enter category name" required
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Description -->
                        <div class="form-group row mb-4">
                            <label for="description" class="col-sm-3 control-label text-sm font-medium">Category
                                Description</label>
                            <div class="col-sm-9">
                                <textarea
                                    class="form-control bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    id="description" name="description" rows="4" placeholder="Enter category description">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Category Image -->
                        <div class="form-group row mb-4">
                            <label for="image" class="col-sm-3 control-label text-sm font-medium">Category Image</label>
                            <div class="col-sm-9">
                                <input type="file" id="image"
                                    class="dropify bg-slate-700 border border-slate-600 rounded-lg text-slate-200 focus:ring-blue-500 focus:border-blue-500"
                                    name="image" />
                                @error('image')
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
                                        {{ old('is_active', 1) == 1 ? 'checked' : '' }}>
                                    <span class="ms-2">Active</span>
                                </label>
                                <label>
                                    <input type="radio" name="is_active" value="0"
                                        {{ old('is_active', 1) == 0 ? 'checked' : '' }}>
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
                                    Create New Category
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
