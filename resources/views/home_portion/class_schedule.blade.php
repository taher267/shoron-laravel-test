<!--Start CLASS SCHEDULE sec -->
<div class="classSch-outer">
    <div class="container">
        <div class="head mb-5">
            <h3 class="">CLASS SCHEDULE</h3>
        </div>
        <ul class="tabs">
            <li class="active"><a href="#monday">Monday</a></li>
            <li><a href="#tuesday">Tuesday</a></li>
            <li><a href="#wednesday">Wednesday</a></li>
            <li><a href="#thursday">Thursday</a></li>
            <li><a href="#friday">Friday</a></li>
            <li><a href="#saturday">Saturday</a></li>
            <li><a href="#sunday">Sunday</a></li>
        </ul>
        {{-- {{$schedule}} --}}
        {{-- <table class="table">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Time</th>
                    <th>Trainer</th>
                </tr>
            </thead>
            <tbody>
                @if (isset($schedule))
                @foreach ($schedule as $class)
                <tr>
                    <td>{{$class->day->day}}</td>
                    <td>{{$class->time}}</td>
                    <td>{{$class->trainer->name}}</td>
                </tr>
                
                @endforeach
                @endif
                <tr>
                    
                </tr>
            </tbody>
        </table> --}}
        
        <div class="table-outer">
            @if (isset($schedule))
            <table class="table tab_container" id="saturday">
                @foreach ($schedule->where('day_id', '=', 1) as $class)
                        <tr>
                            <td>{{$class->course->title}}</td>
                            <td>{{$class->time}}</td>
                            <td>{{$class->trainer->name}}</td>
                            <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                        </tr>                
                    
                @endforeach
                </table>
                <table class="table tab_container" id="sunday">
                    @foreach ($schedule->where('day_id', '=', 2) as $class)
                        
                            <tr>
                                <td>{{$class->course->title}}</td>
                                <td>{{$class->time}}</td>
                                <td>{{$class->trainer->name}}</td>
                                <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                            </tr>                
                        
                    @endforeach
                </table>
                <table class="table tab_container" id="monday">
                    @foreach ($schedule->where('day_id', '=', 3) as $class)
                        <tr>
                            <td>{{$class->course->title}}</td>
                            <td>{{$class->time}}</td>
                            <td>{{$class->trainer->name}}</td>
                            <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                        </tr>
                    @endforeach
                </table>
                <table class="table tab_container" id="tuesday">
                    @foreach ($schedule->where('day_id', '=', 4) as $class)
                        
                            <tr>
                                <td>{{$class->day->day}}</td>
                                <td>{{$class->time}}</td>
                                <td>{{$class->trainer->name}}</td>
                                <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                            </tr>                
                        
                    @endforeach
                </table>
                <table class="table tab_container" id="wednesday">         
                    @foreach ($schedule->where('day_id', '=', 5) as $class)
                    
                        <tr>
                            <td>{{$class->course->title}}</td>
                            <td>{{$class->time}}</td>
                            <td>{{$class->trainer->name}}</td>
                            <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                        </tr>                
                    
                @endforeach
                </table>

                <table class="table tab_container" id="thursday">         
                    @foreach ($schedule->where('day_id', '=', 6) as $class)
                    
                        <tr>
                            <td>{{$class->course->title}}</td>
                            <td>{{$class->time}}</td>
                            <td>{{$class->trainer->name}}</td>
                            <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                        </tr>                
                    
                @endforeach
                </table>

                <table class="table tab_container" id="friday">         
                    @foreach ($schedule->where('day_id', '=', 7) as $class)
                    
                        <tr>
                            <td>{{$class->course->title}}</td>
                            <td>{{$class->time}}</td>
                            <td>{{$class->trainer->name}}</td>
                            <td><a href="{{route('contact.form')}}" class="btn">Join Now</a></td>
                        </tr>                
                    
                @endforeach
                </table>
            @endif
        </div>
    </div>
</div>
<!-- End CLASS SCHEDULE sec