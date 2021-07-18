<!--Start CLASS SCHEDULE sec -->
<div class="classSch-outer">
    <div class="container">
        <div class="head mb-5">
            <h3 class="">CLASS SCHEDULE</h3>
        </div>
        <ul class="tabs">   
            @foreach ($days as $day)
                <li><a href="#{{strtolower($day->day)}}">{{strtoupper($day->day)}}</a></li>
            @endforeach
        </ul>
        
        <div class="table-outer">
            @if (isset($schedule))
                @foreach ($days as $day)
                <table class="table tab_container" id="{{$day->day}}">
                    @foreach ($schedule->where('day_id', '=', $day->id) as $class)
                        @if ($class->day_id == $day->id )
                            <tr>
                                    <td class="text-capitalize">{{$class->course->title}}</td>
                                    <td>{{$class->time}}</td>
                                    <td class="text-capitalize">{{$class->day->day}}</td>
                                    <td>{{$class->trainer->name}}</td>
                                    <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                                </tr>  
                        @endif
                    @endforeach
                </table> 
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- End CLASS SCHEDULE sec