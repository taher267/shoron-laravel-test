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
                <div class="d-flex flex-row-reverse"><a class="btn btn-primary mb-3 text-right" href="{{route('trainer.create')}}" title="">New Trainer <i class="fa fa-plus"></i></a>
            </div>
        </div>
        
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">@if(session('msg'))
            <div class="alert alert-primary">
                {{session('msg')}}
            </div>
            @endif</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-center">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Class Time</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="text-center">
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Class Time</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                        @isset ( $trainers )
                        @foreach ($trainers as $trainer)
                        <tr class="text-center text-capitalize">
                            <td title="{{$trainer->id}}">{{ $trainer->name }}</td>
                            <td><img class="w-50 h_100" src="{{asset('storage/assets/trainer/'. $trainer->trainer_image)}}" alt="trainer Feature"></td>
                            <td>{{ $trainer->trainerclasstime->time }}</td>
                            <td>
                                {{-- <a class="btn px-3" href="{{route('trainer.edit', $trainer->id)}}"><i class="fa fa-edit"></i> Edit</a> --}}
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#trainerEditModal_{{$trainer->id}}"><i class="fa fa-edit"></i> Edit</button>
                                {{-- Delete trainer --}}
                                {!! Form::open(['route' => ['trainer.destroy', $trainer->id], 'method' => 'delete']) !!}
                                <button title="{{$trainer->id}}" class="btn-warning btn" onclick="return confirm('Are you Sure to delete {{$trainer->name}}?')" type="submit"><i class="fa fa-trash"></i> Delt</button>
                                
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        {{-- Modal start --}}
                        <div class="modal fade" id="trainerEditModal_{{$trainer->id}}" tabindex="-1" aria-labelledby="trainerEditModalLabel{{$trainer->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="trainerEditModalLabel{{$trainer->id}}">Edit info of {{$trainer->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::model($trainer, [ 'route' => ['trainer.update', $trainer->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                                            {!! Form::text('name', NULL, ['class' => 'form-control ', 'placeholder' => 'Name']) !!}
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                                            @if (isset($trainer->trainer_image) )
                                            <span class="input-group-text">
                                                <img style="width:28px" src="{{asset('storage/assets/trainer/' . $trainer->trainer_image)}}">
                                            </span>
                                            @endif
                                            {!! Form::file('trainer_image', ['class' => 'form-control ']) !!}
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                        <span class="input-group-text"><i class="fas fa-clock text-primary"></i></span>
                                        {!! Form::select('class_time_id', $classtime, null, ['class' => 'form-control ', 'placeholder' => 'Select Option']) !!}
                                    </div>
                                        <div class="modal-footer">
                                            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                            {{-- Modal end --}}
                            @endforeach
                            @endisset
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @stop