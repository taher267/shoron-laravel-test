@extends('layout.main')
@section('title', 'News Details')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/trainers-banner.png')}});">
    <!-- <span class="banner-shadow"></span> -->
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>news</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li><a href="">news</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
<!-- Start News sec -->
<div class="news @isset($newses)all_newses @endisset">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="news_left @if(isset($news_details)){{'news_details'}} @endif">
                    @if (isset($news_details))
                    @foreach ($news_details as $news)
                    @if($news->status==1)
                    {{-- Start Single News details or Single news Page --}}
                    <div class="feature p-b-25"><img class="w-100" src="{{asset('storage/assets/news/'. $news->image)}}" class="img-responsive" alt=""></div>
                    <h2>{{$news->title}}</h2>
                    <ul class="post_detail item_details">
                        <li><span class="fa fa-user"></span> Jhon Doe</li>
                        <li><span class="fa fa-calendar"></span> December 30, 2016</li>
                        <li><span class="fa fa-comments"></span> Comments : 01</li>
                    </ul>
                    <p>{{$news->description}}</p>
                    <div class="comments-wrapper">
                        <h3>2 Comments</h3>
                        <ul class="row comments">
                            <li class="col-sm-12 clearfix">
                                <div class="com-img"><img src="{{asset('assets/images/coment-img1.png')}}" class="img-circle" alt=""></div>
                                <div class="com-txt">
                                    <h3>JASON ANDERSON <span>April 14, 2014 at 13:56</span></h3>
                                    <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                                    <a href="#"><span class="icon-reply-icon"></span>Reply</a> </div>
                                </li>
                            </ul>
                        </div>
                        <div class="form-wrapper">
                            <h3>Leave Your Message!</h3>
                            <form>
                                <div class="row input-row">
                                    <div class="col-sm-6">
                                        <input name="name" type="text" placeholder="First Name*" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input name="phone" type="text" placeholder="Last Phone*" required>
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-sm-12">
                                        <textarea name="message" placeholder="Message*"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" name="submit" class="btn" value="Post Comment">
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- End Single News details or Single news Page --}}
                        @endif
                        @endforeach
                        @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                @include('sidebar.sidebar')
        </div>
    </div>
</div>
</div>
<!-- End News sec -->
@endsection