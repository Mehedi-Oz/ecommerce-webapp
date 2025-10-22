<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin - @yield('title')</title>
    @include('admin.include.style')
</head>

<body class="skin-blue fixed-layout">
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>

    <!-- Main Wrapper -->
    <div id="main-wrapper">
        <!-- Header -->
        @include('admin.include.header')

        <!-- Sidebar -->
        @include('admin.include.left-sidebar')

        <!-- Page Content -->
        <div class="page-wrapper">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        @include('admin.include.footer')
    </div>

    <!-- Scripts -->
    @include('admin.include.script')
</body>

</html>
