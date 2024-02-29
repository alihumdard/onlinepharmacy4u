<!DOCTYPE html>
<html lang="en">

<head>
    @include('web.includes.head')
    <title>@yield('title' , 'My WeightLoss')</title>
</head>

<body>
    <div class="wrapper">
        <!-- preloader start -->
        <div class="preloader">
            <div class="loading"><span></span><span></span><span></span><span></span></div>
        </div>
        <!-- /.preloader -->

        @include('web.includes.header')
        @include('web.includes.sidebar')
        @yield('content')
        @include('web.includes.footer')
        @include('web.includes.script')
        @stack('scripts')
    </div><!-- /.wrapper -->
</body>

</html>