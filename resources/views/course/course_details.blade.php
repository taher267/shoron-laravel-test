@extends('layout.main')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/classes-banner.png')}});">
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>classes</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li>classes</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
<!-- Start Classes -->
<div class="feature_class new_detail_page">
    <div class="container">
        <div class="feature-list">
            <div class="freature_content row">   
                @if (isset($class_details))
                @foreach ($class_details as $details)
                <!-- Class Details Start -->
                <div class="col-sm-8 col-xs-12">
                    <div class="news_left">
                    <feature class="pb-3 d-block"><img class="w-100" src="{{asset('storage/assets/class/' . $details->image)}}" alt=""></feature>
                    <h2>Leg Workout</h2>
                    <ul class="post_detail item_details">
                        <li><span class="fa fa-calendar"></span>{{--  Class Time : 10.00 AM - 11.00 AM --}}</li>
                        <li>{{$details->classdetailstime->time}}</li>
                        <li><span class="fa fa-user"></span> Jhon Doe</li>
                    </ul>
                    <p>{{$details->description}}</p>
                    
                    <div class="choose_building">
                        <h4>Why You Choose Body Building?</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nstrud exercitation ullamco laboris. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nstrud exercitation ullamco laboris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-check-square"></i> It’s Help your body balance</li>
                            <li><i class="fa fa-check-square"></i> Daily Work Freshness</li>
                            <li><i class="fa fa-check-square"></i> It’s Help your body balance</li>
                            <li><i class="fa fa-check-square"></i> Daily Work Freshness</li>
                        </ul>
                    </div>
                </div>
                </div>
                @endforeach
                <!-- Class Details End -->
                @endif

                {{-- Category Class Start --}}                
                @if (isset($cateclass))
                <div class="col-lg-8">
                    <div class="row">
                @foreach( $cateclass as $CClass)
                
                        <div class="col-lg-6 col-sm-6 col-xs-12 mb-4 feature_box">
                    <div class="feature">
                        <img src="{{asset($CClass->image)}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span></span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="{{url('classes/details' . '/'. $CClass->id)}}" >{{$CClass->title}}</a></h4>
                    <p>{{$CClass->description}}. <a href="{{ route('classe.details', ['id' =>$CClass->id])}}">Read More...</a></p>
                </div>
                @endforeach
                    </div>
                </div>
                
                
                @endif

                
                {{-- Sidebar Start --}} 
                <div class="col-sm-4 col-xs-12">
                    @include('sidebar.sidebar')
                </div>
                {{-- Sidebar End --}}
     
            </div>
        </div>
    </div>
</div>
<!-- End Classes -->
@if(isset($courses))
    <!-- Start Finess Sec -->
    <div class="fitness_discount discount_sec div_bg" style="background: url('{{asset('assets/images/fitness_bg.png')}}') fixed;">
    <div class="container">
    <h3>Fitness Classes This Summer. <div>Pay Now and</div><div> Get <span class="disc_parcent">25% </span> Discount</div></h3>
    <a href="" class="btn">JOIN WITH US</a>
    </div>
    </div>
    <!-- End Finess sec -->
@endif
@endsection