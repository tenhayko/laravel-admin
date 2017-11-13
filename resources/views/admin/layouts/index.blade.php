<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin Laravel</title>
        <base href="{{asset('')}}">
        <!-- Styles -->
        @yield('style')
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
            	@include('admin.layouts.colLeft')
            	@include('admin.layouts.topNav')
                <!-- Page Content -->
                @yield('content')
                <!-- /#page-wrapper -->
                @include('admin.layouts.footer')
            </div>
        </div>
        @yield('script')
    </body>

</html>
