@extends('admin.master')

@section('title', 'Manage Category')

@section('content')
    <div class="row mt-3">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Categories</h4>
                    <h5 class="text-success">{{ session('message') }}</h5>
                    <div class="table-responsive m-t-40">
                        <table id="myTable" class="table table-striped table-border table-hover text-center">
                            <thead>
                                <tr>
                                    <td>Sl No</td>
                                    <td>Date</td>
                                    <td>Category Name</td>
                                    <td>Category Description</td>
                                    <td>Category Image</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach ($categories as $category) --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: justify; width: 500px">
                                    </td>
                                    <td><img src="" alt="" style="height: 60px; width: 60px">
                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="" title="Edit Category" class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>


                                        <a href="" title="Unpublish Category" class="btn btn-warning btn-sm">
                                            <i class="fa-solid fa-eye-slash"></i>
                                        </a>

                                        <a href="" title="Publish Category" class="btn btn-success btn-sm">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                    </td>
                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
