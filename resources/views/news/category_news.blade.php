@extends('layout.main')
@section('title', 'News Category')
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
                <div class="news_left news_list @if(isset($news_details)){{'news_details'}} @endif">
                    <div class="row">
                        {{-- Category News --}}
                        @if (isset($cateNews))
                        @foreach($cateNews as $news)
                        @if($news->status==1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="news_box">
                                <div class="featured">
                                    <img class="mw-100" src="{{asset('storage/assets/news/'. $news->image)}}" alt="">
                                    <div class="date">
                                        <span>JAN</span>
                                        <strong>20</strong>
                                    </div>
                                </div>
                                <h4>{!! $news->title? $news->title:'' !!}</h4>
                                {{-- <h1>Status{{$news->status}}</h1> --}}
                                @if($news->description)
                                <p>{{ $news->description }} <a href="{{ route( 'news.category.show', [$news->newscategory->slug, $news->slug] ) }}">Read More...</a></p>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                {{-- Include Sidebar --}}
                @include('sidebar.sidebar')
            </div>
        </div>
    </div>
</div>
<!-- End News sec -->
@endsection