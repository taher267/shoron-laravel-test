@include('layout.header')
<body>
<header id="header" class="fixed-top {{request()->is('auth*') ? 'nav_bg_custom' : ''}}" >
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <span class="logo">
                        <a href="{{route('home')}}" title="gym logo"><img class="main_logo" id="main_logo" src="{{asset('assets/images/logo.png')}}" alt="Fitness Gym"></a>
                        <a href="{{route('home')}}" title="gym"><img id="stiky_logo" class="d-none" src="{{asset('assets/images/logo-fix.png')}}" alt="Fitness Gym"></a>
                    </span>
                </div>
                <div class="col-sm-9 col-xs-12 nav_wrap">
                    <!--  Nav Start -->
                    <nav class="navbar navbar-expand-lg ">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav custom_nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('/') ? 'active' : ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('about*') ? 'active' : ''}}" href="{{route('about')}}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('classes*') ? 'active' : ''}}" href="{{route('classes')}}">Classes</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('schedule.index')}}">Schedule</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('trainers*') ? 'active' : ''}}" href="{{route('trainers')}}">Trainers</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link
                                            {{ request()->is('news**') ? 'active' : ''}}
                                            
                                        " href="{{route('news')}}">News</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('contact-form*') ? 'active' : ''}}" href="{{route('contact.form')}}">Contact Us</a>
                                    </li>
                                
                                    <li class="nav-item">
                                        <a class="nav-link {{ request()->is('auth*') ? 'active' : ''}}" href="{{route('auth.login')}}">Login</a>
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
        