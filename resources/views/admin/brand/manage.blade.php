@extends('admin.master')

@section('title', 'Manage Brand')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Brands</h4>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Sl No</th>
                                    <th>Date</th>
                                    <th>Brand Name</th>
                                    <th>Brand Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td class="" style="max-width: 300px;">{{ $brand->description }}</td>
                                        <td>
                                            @if ($brand->image)
                                                <img src="{{ Storage::url($brand->image) }}" alt="Brand Image"
                                                    style="width: 100px;">
                                            @else
                                                <p>No image available.</p>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $brand->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $brand->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('brand.edit', $brand->id) }}" title="Edit"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Toggle Status Button -->
                                            @if ($brand->is_active)
                                                <a href="{{ route('brand.is_active', $brand->id) }}" title="Deactivate"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('brand.is_active', $brand->id) }}" title="Activate"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif

                                            <!-- Delete Button -->
                                            <form action="{{ route('brand.destroy', $brand->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this brand?')">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
