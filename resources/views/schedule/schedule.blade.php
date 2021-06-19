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
                        <li><a href="">sunday</a></li>
                        <li>schedule</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{$schedule}}
<!-- End  Breadcrumbs Banner -->
<!-- Start CLASS SCHEDULE sec -->
<div class="classSch-outer schedulePage my-5">
    <div class="container">
        <div class="heading mt-4 mb-3">
            <h3>CLASS SCHEDULE</h3>
        </div>
        
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            @isset($days)
            @foreach ( $days as $key=> $day )
            @if (! empty($day))
            <li class="nav-item" role="presentation">
                <button class="nav-link -- text-capitalize" id="pills-{{$day}}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{$day}}" type="button" role="tab" aria-controls="pills-{{$day}}" aria-selected="true">{{$day}}</button>
            </li>
            @endif
            @endforeach
            @endisset
        </ul>

        <div class="tab-content" id="pills-tabContent">
            @isset( $schedule )
            @foreach ( $schedule as $data )

            @if ( $data->day->id ==1 )
            
                <div class="tab-pane fade show active" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{ $data->course->title }} </td>
                            <td>{{ $data->time }} </td>
                            <td>{{ $data->trainer->name }} </td>
                            <td>{{ $data->day->day }} </td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif
       {{--      @if ($data->day->id ==2)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif

            @if ($data->day->id ==3)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif

            @if ($data->day->id ==4)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif
            @if ($data->day->id ==5)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif
            @if ($data->day->id ==6)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif
            @if ($data->day->id ==7)
                <div class="tab-pane fade" id="pills-{{$data->day->day}}" role="tabpanel" aria-labelledby="pills-{{$data->day->day}}-tab">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td>{{$data->course->title }}</td>
                            <td>{{$data->time }}</td>
                            <td>{{$data->trainer->name}}</td>
                            <td>{{$data->day->day}}</td>
                            <td><a href="#" class="btn">Join Now</a></td>

                        </tr>                        
                    </tbody>
                </table>
            </div>
            @endif --}}
            @endforeach
            @endisset
        </div>
        <!-- end table capture -->
    </div>
</div>
</div>
<!-- End CLASS SCHEDULE sec -->
<?php
    $chedule=
[
["id"=>1,"day_id"=>2,"time"=>"09.00 am - 12.00 pm","class_id"=>2,"trainer_id"=>10,],
["id"=>2,"day_id"=>1,"time"=>"09.00 am - 12.00 pm","class_id"=>4,"trainer_id"=>4,],
["id"=>3,"day_id"=>1,"time"=>"10.00 am - 12.00 pm","class_id"=>5,"trainer_id"=>5,],
["id"=>4,"day_id"=>2,"time"=>"10.00 am - 12.00 pm","class_id"=>5,"trainer_id"=>3,],
["id"=>5,"day_id"=>1,"time"=>"09.00 am - 12.00 pm","class_id"=>3,"trainer_id"=>5,],
["id"=>6,"day_id"=>7,"time"=>"10.00 am - 12.00 pm","class_id"=>5,"trainer_id"=>9,],
["id"=>7,"day_id"=>3,"time"=>"10.00 am - 12.00 pm","class_id"=>7,"trainer_id"=>4,],
["id"=>8,"day_id"=>4,"time"=>"09.00 am - 12.00 pm","class_id"=>1,"trainer_id"=>11,],
["id"=>9,"day_id"=>5,"time"=>"09.00 am - 12.00 pm","class_id"=>9,"trainer_id"=>12,],
["id"=>10,"day_id"=>6,"time"=>"09.00 am - 12.00 pm","class_id"=>3,"trainer_id"=>8,],
["id"=>11,"day_id"=>2,"time"=>"09.00 am - 12.00 pm","class_id"=>7,"trainer_id"=>2,],
["id"=>12,"day_id"=>2,"time"=>"09.00 am - 12.00 pm","class_id"=>1,"trainer_id"=>7,]
];
?>
{{-- <div class="tab-pane fade show active" id="pills-{{day_id}}" role="tabpanel" aria-labelledby="pills-{{day_id}}-tab">
    <table class="table table-striped">
        <tbody>
            <tr>
                <td>{{ class_id }} </td>
                <td>{{ time }} </td>
                <td>{{ trainer_id }} </td>
                <td>{{ id }} </td>
            </tr>                        
        </tbody>
    </table>
</div> --}}
@endsection