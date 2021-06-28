@extends('layout.main')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/trainers-banner.png')}});">
    <!-- <span class="banner-shadow"></span> -->
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>Trainers</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li>trainers</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
<div class="expart_trainers">
    <div class="container">
        <div class="trainer_list">
            <div class="row trainer_content">
                @foreach($trainers as $trainer)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12  trainer_box">
                    <div class="feature">
                        <img class="col-xs-w-100" src="{{asset('storage/assets/trainer/' . $trainer->trainer_image)}}">
                    </div>
                    <span class="trainer_name">{{$trainer->name}}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--  Expart Trainers End -->
<!-- Professional Start -->
<div class="professional div_bg" style="background:#f89830 url('{{asset('assets/images/orangeBg.png')}}'); background-repeat: repeat !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <img src="/public/assets/images/corses-icon.png" alt="">
                <h4>40 courses a week</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
            </div>
        </div>
    </div>
</div>
<!-- Professional End -->
@endsection