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
            {!! Form::open(['route' => 'trainer.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                {!! Form::text('name', NULL, ['class' => 'form-control ', 'placeholder' => 'Name']) !!}
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                {!! Form::file('trainer_image', ['class' => 'form-control ']) !!}
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-clock text-primary"></i></span>
                {!! Form::select('class_time_id', $classtime, null, ['class' => 'form-control ', 'placeholder' => 'Select Option']) !!}
            </div>
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Add Trainer', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            
        </div>
    </div>
</div>

@stop