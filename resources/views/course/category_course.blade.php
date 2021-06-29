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
            <div class="{{(isset($courses))?'freature_content':''}} row">
                @if (isset($courses))
                @foreach( $courses as $course)
                <div class="col-lg-4 col-sm-6 col-xs-12 mb-4 feature_box">
                    <div class="feature">
                        <img src="{{asset('storage/assets/class/' . $course->image)}}">
                        <div class="time_box">
                            <span class="date">
                                @if ($course->date)
                                    <span class="">{{substr($course->date, 0, 6)}}</span>
                                @endif

                            </span>
                            <span class="time">
                                @if ($course->time)
                                  @foreach(explode('-', $course->time) as $time) 
                                    <span>{{substr($time, 0, 5)}}</span>
                                  @endforeach
                                  <span>
                                      @if( substr( $course->time, 0,2 ) < 12) am
                                      @else pm
                                      @endif
                                  </span>
                                @endif
                            </span>
                        </div>
                    </div>
                    <h4><a href="{{url('classes/details' . '/'. $course->id)}}" >{{$course->title}}</a></h4>
                    <p>{{$course->description}}. <a href="{{ url('classes' . '/' . $course->slug)}}">Read More...</a></p>
                </div>
                @endforeach
                @endif

                @if (isset($class_details))
                <!-- News Details Start -->
                <div class="col-sm-8 col-xs-12">
                    <div class="news_left">
                    <feature class="pb-3 d-block"><img class="w-100" src="{{asset('storage/assets/class/' . $class_details->image)}}" alt=""></feature>
                    <h2>Leg Workout</h2>
                    <ul class="post_detail item_details">
                        <li><span class="fa fa-calendar"></span> Class Time : 10.00 AM - 11.00 AM</li>
                        <li><span class="fa fa-user"></span> Jhon Doe</li>
                    </ul>
                    <p>{{$class_details->description}}</p>
                    
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
                <!-- News Details End -->
                @endif
                {{-- Category Class Start --}}                
                @if (isset($cateClass))
                <div class="col-lg-8">
                    <div class="row">
                @foreach( $cateClass as $class)
                {{-- {{$cateClass}} --}}
                <div class="col-lg-6 col-sm-6 col-xs-12 mb-4 feature_box">
                    <div class="feature">
                        <img src="{{asset('storage/assets/class/' . $class->image)}}">
                        <div class="time_box">
                            <span class="date"><span>16 dec</span></span>
                            <span class="time"><span>6:30 am</span></span>
                        </div>
                    </div>
                    <h4><a href="{{url('classes/details' . '/'. $class->id)}}" >{{$class->title}}</a></h4>
                    <p>{{$class->description}}. <a href="{{ route('class.category.show',[$class->classcategory->slug, $class->slug])}}">Read More...</a></p>
                </div>
                @endforeach
                    </div>
                </div>
                
                
                @endif

{{-- Category Class End --}}
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