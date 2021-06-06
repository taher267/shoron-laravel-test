@extends('layout.main')
@section('main_content')
<!-- Start Breadcrumbs Banner -->
<div class="breadcrumbs_banner news_banner div_bg" style="background: url({{asset('assets/images/trainers-banner.png')}});">
    <!-- <span class="banner-shadow"></span> -->
    <div class="container">
        <div class="content banner_content" data-aos="fade-down">
            <h1>schedule</h1>
            <div class="breadcrumbs_content">
                <div class="container">
                    <ul id="breadcrumbs" class="breadcrumbs">
                        <li><a href="">Home</a></li>
                        <li>schedule</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End  Breadcrumbs Banner -->
 <!-- Start CLASS SCHEDULE sec -->
        <div class="classSch-outer schedulePage">
            <div class="container">
                <div class="head">
                    <h3>CLASS SCHEDULE</h3>
                </div>
                <ul class="tabs">
                    <li class="active"><a href="#mon">Monday</a></li>
                    <li><a href="#tus">Tuesday</a></li>
                    <li><a href="#wed">Wednesday</a></li>
                    <li><a href="#thrus">Thursday</a></li>
                    <li><a href="#friday">Friday</a></li>
                    <li><a href="#sat">Saturday</a></li>
                    <li><a href="#sun">Sunday</a></li>
                </ul>
                <div class="table-outer">
                    <table class="table tab_container" id="mon">
                        <tbody>
                        <tr>
                            <td>Weight Lifting</td>
                            <td>09.00 am - 12.00 pm</td>
                            <td>Michal Khurp</td>
                            <td><a href="#" class="btn">Join Now</a></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
        </div>
        <!-- End CLASS SCHEDULE sec -->

@endsection