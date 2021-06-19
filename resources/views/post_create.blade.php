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
<div class="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>

                    </div>

        <img src="{{asset('storage/'.Session::get('image')) }}" />

        @endif
                {!! Form::open(['route'=> 'post.create', 'method'=>'post', 'enctype' =>'multipart/form-data']) !!}
                {{-- {!! Form::file('image',, ['class'=>'form-control']) !!} --}}
                <input type="file" name="image" class="form-control">
                {!! Form::submit('Image UP', ['class' => 'form-control btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<!-- End News sec -->
@endsection