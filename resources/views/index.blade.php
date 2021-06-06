@extends('layout.main')
@section('main_content')
<!-- Banner Start -->
<div id="home_banner" class="home_banner" style="background: url({{asset('assets/images/home-banner.jpg')}});">
    <div class="container">
        <div class="banner_content" data-aos="fade-right">
            <h1>BUILD YOUR BODY</h1>
            <h2>STRONG</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In quam libero, molestie in sapien sit amet, vestibulum ultricies est. Vestibulum ac odio a magna aliquet iaculis. Ut vehicula mauris a magna </p>
            <a href="#" class="btn join_btn">JOIN WITH US</a>
        </div>
    </div>
</div>
<!--Banner End -->
<!-- pure javascript -->
<!-- Start building -->
<div class="building" style="background:url({{asset('assets/images/building_bg.png')}});">
    <div class="container">
        <div class="building-list">
            <div class="row text-center">
                @foreach($buildings as $build)
                <div class="col-lg-4 col-sm-12 ">
                    <div class="building-box">
                    <figure><img src="{{asset($build->build_img)}}" alt=""></figure>
                    <h4>{{$build->title}}</h4>
                    <p>{{$build->description}}</p>
                    <a href="{{$build->id}}" class="btn">View Detail</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<!-- End building sec -->
<!-- Start Featured Class -->
<div class="feature_class">
    <div class="container">
        <div class="freature_heading heading_right_line heading">
            <h3><span style="padding-right: 5px">FEATURED CLASSES </span> </h3>
        </div>
        <div class="feature-list">
            <div class="freature_slide owl-carousel heading_straight_owl_nav">
                @foreach($courses as $course)
                    <div class="col-lg-12 feature_box">
                        <div class="feature">
                            <img src="{{asset($course->image)}}">
                            <div class="time_box">
                                <span class="date"><span>16 dec</span></span>
                                <span class="time"><span>6:30 am</span></span>
                            </div>
                        </div>
                        <h4><a href="{{$course->id}}" >{{$course->title}}</a></h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- End Featured Class -->

<!-- Muscle Start -->
<div class="container-fluid m-0 p-0">
    <div class="row  m-0">
        <div class="col-lg-6 muscle_feature p-0"> <!--  -->
            <img src="{{asset('assets/images/mucle-img.png')}}" alt="">
        </div>
        <div class="col-lg-6 muscle_content"> <!-- m-0 p-0 -->
            <div class="muscle_para">
                <h3>MUSCLE BUILDING</h3>
                <h4>12-Week Bulking Trainer Expert Brandon Poe</h4>
                <a href="" class="btn">JOIN WITH US</a>
            </div>
        </div>
    </div>
</div>
<!-- Muscle End  -->

@yield('expart_trainer')
<!--  Gallery Start-->
<div class="gallery ">
    <div class="container">
        <div class="gallery_heading heading">
        <h3>Our Gallery </h3>
        </div>
        <ul class="tabs">
            <li class="active"><span data-filter="*">All</span></li>
            @foreach($uniqueDatas as $data)
            <li><span class="text-capitalize" data-filter=".{{$data}}">{{$data}}</span></li>
            @endforeach
            
        </ul>
        <div class="gallery_list">
            <div class="row grid_list">
                @foreach($galleries as $gallery)
                <div class="col-lg-3 col-md-4 col-sm-12 mb-4 element-item {{$gallery->course}}">
                    <div class="gallery_box">
                        <img class="featured" src="{{asset($gallery->course_image)}}" alt="">
                        <a href="{{$gallery->id}}" class="gallery_overlay">
                            <i class="fa fa-search-plus"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!--  Gallary End -->

<!-- Latest News  Start-->
<div class="latest_news ">
    <div class="container">
        <div class="latest_news_heading heading">
            <h3><span style="padding-right: 5px">latest news</span> </h3>
        </div>
        <div class="latest_news_list">
            <div class="row">
                @if (isset($latestNews))
                    @foreach ($latestNews as $latest)
                        <div class="col-lg-4 col-sm-12">
                    <div class="news_box">
                        <div class="featured">
                            <img src="{{asset(
                                $latest->image)}}" alt="">
                            <div class="date">
                                <span>JAN</span>
                                <strong>20</strong>
                            </div>
                        </div>
                        <h4>{{$latest->title}}</h4>
                        <p>{{$latest->description}} <a href="{{url('news/details'. '/'. $latest->id)}}">Read More...</a></p>
                    </div>
                </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </div>
</div><!-- Latest News End-->
@endsection