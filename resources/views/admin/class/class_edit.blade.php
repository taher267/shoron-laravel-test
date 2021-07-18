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
            <div class="row">
                @isset($pageHead)
                <div class="col-6"><h2 class="text-info mb-3">{{$pageHead}}</h2></div>
                @endisset
                <div class="col-6"><a class="btn" href="{{route('class.index')}}" title="All Classes"><i class="fas fa-angle-left"></i> Back</a></div>
            </div>
            @if ($errors->any())
            @foreach ($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
            @endforeach
            @endif
        </div>
        {{-- {{$class->id}} --}}
        
        <div class="col-lg-8 justify-content-between">
            {!! Form::model($class, [ 'route' => ['class.update', $class->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-heading text-primary"></i></span>
                {!! Form::text('title', NULL, ['class' => 'form-control text-capitalize', 'placeholder' => 'Edit Title']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-audio-description text-primary"></i></span>
                {!! Form::text('description', NULL, ['class' => 'form-control ', 'placeholder' => 'Edit Desctiption']) !!}
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                @if (isset($class->image) )
                <span class="input-group-text">
                    <img style="width:28px" src="{{asset('storage/assets/class/' . $class->image)}}">
                </span>
                @endif

                {!! Form::file('image', ['class' => 'form-control ', 'placeholder' => 'News Desctiption']) !!}
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                {!! Form::select('trainer', $trainer, null, ['class' => 'form-control text-capitalize ', 'placeholder' => 'Select Option', 'id'=> 'trainer']) !!}
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-clock text-primary"></i></span>
                {!! Form::select('class_time', $classtime, null, ['class' => 'form-control text-uppercase ', 'placeholder' => 'Select Option', 'id'=> 'class_time']) !!}
            </div>
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Update Class', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop