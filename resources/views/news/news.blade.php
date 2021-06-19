@extends('layout.main')
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
                        @if (isset($newses))
                        @foreach($newses as $news)
                        <div class="col-sm-6 col-xs-12">
                            <div class="news_box">
                                <div class="featured">
                                    <img class="mw-100 h-300" src="{{asset('storage/assets/news/'. $news->image)}}" alt="">
                                    <div class="date">
                                        @if ($news->date)
                                          @foreach(explode('-', $news->date) as $date) 
                                            <span class="date_per text-uppercase">{{$date}}</span>
                                          @endforeach
                                        @endif
                                    </div>
                                </div>
                                <h4>{!! $news->title? $news->title:'' !!}</h4>
                                @if($news->description)
                                <p>{{ $news->description }} <a href="{{ route('news.details',[$news->slug]) }} ">Read More...</a></p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                        {{-- Category News --}}
                        
                        @if (isset($cateNews))
                        @foreach($cateNews as $news)
                        <div class="col-sm-6 col-xs-12">
                            <div class="news_box">
                                <div class="featured">
                                    <img src="{{asset('storage/assets/news/'. $news->image)}}" alt="">
                                    <div class="date">
                                        <span>JAN</span>
                                        <strong>20</strong>
                                    </div>
                                </div>
                                <h4>{!! $news->title? $news->title:'' !!}</h4>
                                @if($news->description)
                                <p>{{ $news->description }} <a href="{{ route( 'news.details', [$news->id] ) }}">Read More...</a></p>
                                <p>{{ $news->description }} <a href="{{ route( 'news.details', [$news->slug] ) }}">Read More...</a></p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                    {{-- Category news end --}}
                    @if (isset($news_details))
                    @foreach ($news_details as $news)

                    {{-- Start Single News details or Single news Page --}}
                    <div class="feature p-b-25"><img class="w-100" src="{{asset('storage/assets/news/'. $news->image)}}" class="img-responsive" alt=""></div>
                    <h2>{{$news->title}}</h2>
                    <h2>{{$news->id}}</h2>
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

                        
                    @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="news-right">
                        <div class="search-block clearfix">
                            <input name="Search" type="text" placeholder="Search here...">
                            <button class="search"><span class="fa fa-search"></span></button>
                        </div>
                        <div class="category">
                            <h3>Categories</h3>
                            <ul>
                                @if (isset($categories))
                                @foreach($categories as $category)
                                @if($category->category)
                                <li><a href="{{route('news.category', [$category->slug])}}"><i class="fa fa-long-arrow-alt-right"></i> {{$category->category}} </a></li>
                                @endif
                                @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="archives">
                            <h3>Archives</h3>
                            <ul>
                                <li><a href="#"><i class="fa fa-long-arrow-alt-right"></i> February <span>2016(3)</span></a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-alt-right"></i> January <span>2016(3)</span></a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-alt-right"></i> March <span>2016(3)</span></a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-alt-right"></i> November <span>2016(3)</span></a></li>
                                <li><a href="#"><i class="fa fa-long-arrow-alt-right"></i> December <span>2016(3)</span></a></li>
                            </ul>
                        </div>
                        <div class="pouplar-news">
                            <h3>Popular NEWS</h3>
                            <ul>
                                <li class="clearfix"> <a href="#">
                                    <div class="img-block"><img src="{{asset('assets/images/pn-thumb1.png')}}" class="img-responsive" alt=""></div>
                                    <div class="detail">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur...</p>
                                        <span>April 1, 2014</span>
                                    </div>
                                </a> </li>
                                <li class="clearfix"> <a href="#">
                                    <div class="img-block"><img src="{{asset('assets/images/pn-thumb2.png')}}" class="img-responsive" alt=""></div>
                                    <div class="detail">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur...</p>
                                        <span>April 1, 2014</span>
                                    </div>
                                </a> </li>
                                <li class="clearfix"> <a href="#">
                                    <div class="img-block"><img src="{{asset('assets/images/pn-thumb3.png')}}" alt=""></div>
                                    <div class="detail">
                                        <h4>Lorem ipsum dolor sit amet</h4>
                                        <p>Aliquam eu malesuada risus. Vivamus sagittis enim tempor eros consectetur...</p>
                                        <span>April 1, 2014</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="news-adds">
                    <figure><img src="{{asset('assets/images/news-adds.png')}}" alt=""></figure>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End News sec -->
@endsection