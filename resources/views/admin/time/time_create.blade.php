@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    @if(session('msg'))
    <div class="alert alert-primary">
        {{session('msg')}}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-12">
              @isset($pageHead)
        <div class="col-12"><h2 class="text-info mb-3">{{$pageHead}}</h2></div>
        @endisset
        @if ($errors->any())
            @foreach ($errors->all() as $err)
                <div class="alert alert-danger">{{$err}}</div>
            @endforeach
        @endif 
        </div>
           
        <div class="col-lg-8 justify-content-between">
            {!! Form::open(['route' => 'time.store']) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-calendar-day text-primary"></i></span>
                {!! Form::select('day_id', $days, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Day']) !!}
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-skiing-nordic text-primary"></i></span>
                {!! Form::select('class_id', $classes, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Class']) !!}
                
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-clock text-primary"></i></span>
                {!! Form::text('time', NULL, ['class' => 'form-control ', 'placeholder' => 'Class Time']) !!}
                
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-chalkboard-teacher text-primary"></i></span>
                {!! Form::select('trainer_id', $trainers, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Trainer']) !!}
            </div>
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Add Schedule', ['class' => 'form-control btn btn-primary', 'placeholder' => 'Class Time']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop