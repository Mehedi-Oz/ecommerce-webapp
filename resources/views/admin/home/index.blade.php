@extends('admin.master')

@section('title', 'Dashboard')

@section('content')

    <!-- Breadcrumb and Page Title -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h4 class="text-themecolor">Admin Dashboard</h4>
        </div>
        <div class="col-md-7 align-self-center text-end">
            <div class="d-flex justify-content-end align-items-center">
                <ol class="breadcrumb justify-content-end">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Info Boxes -->
    <div class="row g-0">
        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-screen-desktop"></i></h3>
                                    <p class="text-muted">New Clients This Month</p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-primary">23</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-note"></i></h3>
                                    <p class="text-muted">Ongoing Projects</p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-cyan">169</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-cyan" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-doc"></i></h3>
                                    <p class="text-muted">Invoices Generated</p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-purple">157</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-purple" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card border">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <h3><i class="icon-bag"></i></h3>
                                    <p class="text-muted">Total Projects Completed</p>
                                </div>
                                <div class="ms-auto">
                                    <h2 class="counter text-success">431</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Yearly Sales Chart -->
    <div class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex m-b-40 align-items-center no-block">
                        <h5 class="card-title">Yearly Sales Overview</h5>
                        <div class="ms-auto">
                            <ul class="list-inline font-12">
                                <li><i class="fa fa-circle text-cyan"></i> iPhone</li>
                                <li><i class="fa fa-circle text-primary"></i> iPad</li>
                                <li><i class="fa fa-circle text-purple"></i> iPod</li>
                            </ul>
                        </div>
                    </div>
                    <div id="morris-area-chart" style="height: 340px;"></div>
                </div>
            </div>
        </div>

        <!-- Weather and Carousel -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-cyan text-white">
                        <div class="card-body">
                            <div class="row weather">
                                <div class="col-6 m-t-40">
                                    <h3>Current Weather</h3>
                                    <div class="display-4">73<sup>°F</sup></div>
                                    <p class="text-white">Dhaka, Bangladesh</p>
                                </div>
                                <div class="col-6 text-end">
                                    <h1 class="m-b-"><i class="wi wi-day-cloudy-high"></i></h1>
                                    <b class="text-white">Sunny Day</b>
                                    <p class="op-5">April 14</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <div id="myCarouse2" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <h4 class="cmin-height">Our <span class="font-medium">Top Seller</span> this month
                                            is breaking all records!</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="{{ asset('/') }}admin/assets/images/users/1.jpg"
                                                    alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">John Doe</h4>
                                                <p class="text-white">Product: Wireless Headphones</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h4 class="cmin-height">Our <span class="font-medium">Best Reviewed</span> product
                                            is trending worldwide!</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="{{ asset('/') }}admin/assets/images/users/2.jpg"
                                                    alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">Jane Smith</h4>
                                                <p class="text-white">Product: Smartwatch Series 5</p>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <h4 class="cmin-height">Our <span class="font-medium">Fastest Growing</span>
                                            category is Electronics this quarter!</h4>
                                        <div class="d-flex no-block">
                                            <span><img src="{{ asset('/') }}admin/assets/images/users/3.jpg"
                                                    alt="user" width="50" class="img-circle"></span>
                                            <span class="m-l-10">
                                                <h4 class="text-white m-b-0">Michael Brown</h4>
                                                <p class="text-white">Category: Electronics</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
