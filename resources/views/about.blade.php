@extends('layout.main')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/trainers-banner.png')}});">
    <!-- <span class="banner-shadow"></span> -->
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>ABOUT US</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li>About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
<!-- About Top Start -->
<div class="about_top">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12">
                <div class="about_top_left">
                    <h3>STAY FOCUSSED <span>STAY FIT & HEALTHY</span></h3>
                    <p>Lorem ipsum dolor sit amet, et nulla mnesarchum disputationi quo, eum suscipit facilisi ea. Sea magna persius saperet ne, nonumy nemore et duo, te quis graece scaevola nec. Cu denique phaedrum pertinacia sed. Iisque latine labitur his ex, porro vivendum no qui. uem epicuri qualisque et sea.</p>
                    <p>
                    Sit repudiandae contentiones eu, an atqui interesset usu, usu ad appareat tacimates platonem. In eum eleifend intellegam, mucius labores assueverit vel ne. An nam viris option. Cum no eruditi albucius, quo eros lucilius dissentiet et.</p>
                    <ul>
                        <li>
                            <h4><i class="fa fa-check-square"></i> WE HAVE GYM TRAINER</h4>
                            <p>Lorem ipsum dolor sit amet, et nulla mnesarchum disputationi quo, eum suscipit facilisi ea. Sea magna persius saperet ne, nonumy nemore et duo, te quis graece scaevola nec.</p>
                        </li>
                        <li>
                            <h4><i class="fa fa-check-square"></i> MODERN GYM & FITNESS FACILITIES</h4>
                            <p>Lorem ipsum dolor sit amet, et nulla mnesarchum disputationi quo, eum suscipit facilisi ea. Sea magna persius saperet ne, nonumy nemore et duo, te quis graece scaevola nec.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-md-6 section_hide">
                <div class="about_top_right">
                    <img src="{{asset('assets/images/about-fig.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Top end -->
<!-- Professional Start -->
<div class="professional div_bg" style="background:#f89830 url('{{asset('assets/images/orangeBg.png')}}') repeat !important; background-size: unset !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="professional_content">                   
                    <img src="{{asset('assets/images/corses-icon.png')}}" alt="">
                    <h4>40 courses a week</h4>
                    <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus. Ut a ligula ac dolor tempus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="professional_content">                   
                    <img src="{{asset('assets/images/professional-icon.png')}}" alt="">
                    <h4>6 PROFESSIONAL TRAINERS</h4>
                    <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus. Ut a ligula ac dolor tempus.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 text-center">
                <div class="professional_content">                   
                    <img src="{{asset('assets/images/effective-icon.png')}}" alt="">
                    <h4>EFFECTIVE GROUP TRAINING</h4>
                    <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur, at ullamcorper neque maximus. Ut a ligula ac dolor tempus.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Professional End -->
@endsection