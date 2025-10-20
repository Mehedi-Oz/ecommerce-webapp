<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ecommerce-@yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}website/images/favicon.svg" />
    @include('website.include.style')
</head>

<body>

    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    @include('website.include.header')


    @yield('content')


    @include('website.include.footer')


    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>


    @include('website.include.script')
</body>

</html>
