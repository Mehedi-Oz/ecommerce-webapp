@extends('admin.master')

@section('title', 'Manage Unit')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Units</h4>
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
                                    <th>Unit Name</th>
                                    <th>Unit Code</th>
                                    <th>Unit Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $unit->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>{{ $unit->code }}</td>
                                        <td class="" style="max-width: 300px;">{{ $unit->description }}</td>
                                        <td>
                                            <span class="badge {{ $unit->is_active ? 'bg-success' : 'bg-danger' }}">
                                                {{ $unit->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('unit.edit', $unit->id) }}" title="Edit"
                                                class="btn btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            <!-- Toggle Status Button -->
                                            @if ($unit->is_active)
                                                <a href="{{ route('unit.is_active', $unit->id) }}" title="Deactivate"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="fa-solid fa-eye-slash"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('unit.is_active', $unit->id) }}" title="Activate"
                                                    class="btn btn-success btn-sm">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            @endif

                                            <!-- Delete Button -->
                                            <form action="{{ route('unit.destroy', $unit->id) }}" method="POST"
                                                style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="Delete" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this unit?')">
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
