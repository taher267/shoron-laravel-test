<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Bismillah')</title>
        <!-- owl carousel css -->
        <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <!-- owl carousel theme css -->
        <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
        <!--  bootstrap css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- font Awesome css -->
        <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">
        
        <!-- lightbox css -->
        <link href="{{asset('assets/css/lightbox.min.css')}}" rel="stylesheet">
        <!-- Custom font css -->
        <link href="{{asset('assets/customfonts/poppins.css')}}" rel="stylesheet">
        @if (Request::is('auth*'))
        <!-- Custom styles for this admin template-->
        <link rel="stylesheet" type="text/css" href="{{asset('admin/css/sb-admin-2.min.css')}}">
        @endif

        @if (Request::is('auth/login'))
        <!-- Custom styles for this admin template-->
        {{-- Bootstrap icon css --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap-icons.css')}}"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        @endif

        <!-- Custom css -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <!--Display None style-->
        <link href="{{asset('assets/css/d-none-style.css')}}" rel="stylesheet">
        <!-- Responsive css -->
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
        <script src="{{asset('assets/js/purejs.js')}}"></script>
        
    </head>