@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>
        <div class="row">
            <div class="col-lg-6">
                @isset($pageHead)
                <div class="col-12"><h2 class="text-info ">{{$pageHead}}</h2></div>
                @endisset
            </div>
            <div class="col-lg-6">
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right" href="{{route('time.create')}}" title="">Add Time <i class="fa fa-plus"></i></a>
            </div>
        </div>
        
    </div>
    
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <ul class="tabs schedule_tabs">
                        @foreach ($days as $day)
                           <li class="mx-2"><a class="btn bg-secondary text-capitalize border-0 text-light px-3" href="#{{$day}}" title="{{$day}}">{{$day}}</a></li> 
                        @endforeach
                        
                    </ul>
                    <thead class="text-center">
                        <tr>
                            <th>Course</th>
                            <th>Time</th>
                            <th>Trainer</th>
                            <th>Day</th>
                            <th>Join</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>Course</th>
                        <th>Time</th>
                        <th>Trainer</th>
                        <th>Day</th>
                        <th>Join</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @isset ( $schedule )
                        @foreach ($schedule as $time)
                        <tr class="text-center text-capitalize">
                            <td>{{ $time->course->title }}</td>
                            <td>{{$time->time}}</td>
                            <td>{{$time->trainer->name}}</td>
                            <td>{{$time->day->day}}</td>
                            <td><a class="btn px-3" href="{{route('contact')}}" title="">Join Now</a></td>
                            <td>
                                <a class="btn px-3" href="{{$time->id}}"><i class="fa fa-edit"></i> Edit</a>
                                <a class="btn px-3" href="{{$time->id}}"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                        @endisset
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop