@extends('layout.main')
@section('title', 'Contact Form')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/contact-us-banner.png')}});">
    <!-- <span class="banner-shadow"></span> -->
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>contact us</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li><a href="">contact us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
@if (Session::has('message'))
<h1>{{$message}}</h1>
@endif
<!-- Start Cal Info -->
<div class="cal-info-outer">
    <div class="container">
        <div class="cal-info-list">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="cal-info-box">
                        @if ($addresses[0]->locationsign)
                    <figure><img src="{{asset('storage/assets/contact/'. $addresses[0]->locationsign)}}" alt=""></figure>
                    @endif
                    @if ($addresses[0]->location)
                    <p>{{$addresses[0]->location}}</p>
                    @endif
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="cal-info-box">
                    @if ($addresses[0]->phonesign)
                <figure><img src="{{asset('storage/assets/contact/'.$addresses[0]->phonesign)}}" alt=""></figure>
                @endif
                <p>
                @if ($addresses[0]->phone_no)
                    @foreach(explode(',', $addresses[0]->phone_no) as $phone)
                    <a class="d-block" href="tel:{{$phone}}">{{$phone}}</a>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="col-sm-4 col-xs-12">
            <div class="cal-info-box">
                @if ($addresses[0]->emailsign)
            <figure><img src="{{asset('storage/assets/contact/'. $addresses[0]->emailsign)}}" alt=""></figure>
            @endif
            @if ($addresses[0]->email)
              <p><a href="{{$addresses[0]->email}}">{{$addresses[0]->email}}</a></p>  
            @endif
            
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- End Cal Info sec -->
<!-- Start Contact sec -->
<div class="contact-outer">
<div class="container">
<div class="row">
<div class="col-sm-7 col-xs-12">
    <div class="form-wrapper">
        <h3>Leave Your Message!</h3>
        <p>We are always excited to hear from you, so please feel free to contact us and we will gladly reply to any and all queries you may have.</p>
        
        @if ($errors->any())
        @foreach ($errors->all() as $err)
        <div class="alert alert-danger">{{$err}}</div>
        @endforeach
        @endif
        {!! Form::open(['route'  => 'contact.send', 'method' =>'post', 'class' => 'contactform', 'name'=>'contactform']) !!}
        <div class="row input-row">
            <div class="col-sm-12">
                {!! Form::text('name', NULL, ['placeholder' => 'Name*']) !!}
            </div>
        </div>
        <div class="row input-row">
            <div class="col-sm-12">
                {!! Form::email('email', NULL, ['placeholder' => 'Email*']) !!}
            </div>
        </div>
        <div class="row input-row">
            <div class="col-sm-12">
                {!! Form::text('phone_no', NULL, ['placeholder' => 'Phone*']) !!}
            </div>
        </div>
        <div class="row input-row">
            <div class="col-sm-12">
                {!! Form::textarea('messages', NULL, ['placeholder' => 'Message*']) !!}
            </div>
        </div>
        <input type="hidden" name="contact_id" value="<?php echo rand(100000,9999999);?>">
        <div class="row">
            <div class="col-sm-12">
                {!! Form::submit('SEND MESSAGE', ['class' => 'btn']) !!}
                @if (session('message'))
                <span class="ml-5 alert text-success">
                    {{session('message') }}
                </span>
                @endif
            </div>
        </div>
        
        {!! Form::close() !!}
        
        <div class="msg"></div>
    </div>
</div>
<div class="col-sm-5 col-xs-12">
    <div class="contact-info clearfix">
        <h3>Other ways to Connect</h3>
        <!-- Start Map sec -->
        <div class="map-outer">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d65339392.4350941!2d55.99358928033311!3d-1.7298545669350953!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1527081802518" allowfullscreen></iframe>
        </div>
        <!-- End Map sec -->
    </div>
</div>
</div>
</div>
</div>
<!-- End Contact sec -->
@endsection