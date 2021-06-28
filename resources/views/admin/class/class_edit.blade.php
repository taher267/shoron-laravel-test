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
        {{-- {{$class->id}} --}}
        
        <div class="col-lg-8 justify-content-between">
            {!! Form::model($class, [ 'route' => ['news.update', $class->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-heading text-primary"></i></span>
                {!! Form::text('title', NULL, ['class' => 'form-control ', 'placeholder' => 'Edit Title']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-audio-description text-primary"></i></span>
                {!! Form::text('description', NULL, ['class' => 'form-control ', 'placeholder' => 'Edit Desctiption']) !!}
            </div>
            {{-- <img class="w-50" src="{{asset('storage/assets/news/'. $class[0]->image)}}" alt=""> --}}

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
                <span class="input-group-text"><i class="fas fa-object-group text-primary"></i></span>
                {{-- {!! Form::select('cat_id', $categories, null, ['class' => 'form-control text-capitalize ', 'placeholder' => 'Select Category', 'id'=> 'news_category']) !!} --}}
            </div>
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Update Class', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop