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