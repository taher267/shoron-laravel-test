<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Bismillah')</title>
        <!-- lightbox css -->
        <link href="{{asset('assets/css/lightbox.min.css')}}" rel="stylesheet">
        <!-- owl carousel css -->
        <link href="{{asset('assets/css/owl.carousel.min.css')}}" rel="stylesheet">
        <!-- owl carousel theme css -->
        <link href="{{asset('assets/css/owl.theme.default.min.css')}}" rel="stylesheet">
        <!--  bootstrap css -->
        <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!-- font Awesome css -->
        <link href="{{asset('assets/css/all.min.css')}}" rel="stylesheet">
        <!-- Custom font css -->
        <link href="{{asset('assets/customfonts/poppins.css')}}" rel="stylesheet">
        <!-- Custom css -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
        <!-- Responsive css -->
        <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet">
        
    </head>
    <body>
        <header id="header" class="fixed-top" >
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <span class="logo">
                            <a href="{{route('home')}}" title="gym logo"><img class="main_logo" id="main_logo" src="{{asset('assets/images/logo.png')}}" alt="Fitness Gym"></a>
                            <a href="{{route('home')}}" title="gym"><img id="stiky_logo" class="stiky_logo" src="{{asset('assets/images/logo-fix.png')}}" alt="Fitness Gym"></a>
                        </span>
                    </div>
                    <div class="col-sm-9 col-xs-12 nav_wrap">
                        <!--  Nav Start -->
                        <nav class="navbar navbar-expand-lg navbar-light  ">
                            <div class="container-fluid">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="navbar-nav custom_nav me-auto mb-2 mb-lg-0">
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="{{url('/')}}">Home</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('about') ? 'active' : ''}}" href="about">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('classes') ? 'active' : ''}}" href="{{route('classes')}}">Classes</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{url('schedule')}}">Schedule</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('trainer') ? 'active' : ''}}" href="trainer">Trainers</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('news') ? 'active' : ''}}" href="{{route('news')}}">News</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('contact') ? 'active' : ''}}" href="contact">Contact Us</a>
                                        </li>
                                    </ul>
                                    <!--  <form class="d-flex">
                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit" >Search</button>
                                    </form> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                
                <!--  Nav End -->
            </div>
        </header><!-- /header -->
        @yield('main_content')
        @include('layout.footer')

        <!-- Jquery -->
        <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
        <!-- lightbox JS -->
        <script src="{{asset('assets/js/lightbox.min.js')}}"></script>
        <!-- Breadcrumbs JS -->
        <script src="{{asset('assets/js/breadcrumbs.min.js')}}"></script>
        <!-- isotope JS -->
        <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
        <!-- Owl Carousle JS -->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- Fontawesome JS -->
        <!-- <script src="{{asset('assets/js/all.min.js')}}"></script> -->
        <!-- Bootstrap JS -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/main.js')}}"></script>
        <script type="text/javascript">
        </script>
    </body>
</html>