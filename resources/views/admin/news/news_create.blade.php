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
                <div class="col-lg-6 text-right">
                    <a class="btn animatedBtb" href="{{route('news.list')}}"><i class="fas fa-arrow-left text-primary" id="pot"></i> All news</a>
                </div>
            </div>
            
            @if ($errors->any())
            @foreach ($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
            @endforeach
            @endif
        </div>
        
        <div class="col-lg-8 m-auto">
            {!! Form::open(['route' => 'news.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-heading text-primary"></i></span>
                {!! Form::text('title', NULL, ['class' => 'form-control ', 'placeholder' => 'News Title']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-audio-description text-primary"></i></span>
                {!! Form::text('description', NULL, ['class' => 'form-control ', 'placeholder' => 'News Desctiption']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                {!! Form::file('image', ['class' => 'form-control ', 'placeholder' => 'News Desctiption']) !!}
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-object-group text-primary"></i></span>
                {!! Form::select('cat_id', $categories, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Category']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> <i class="fas fa-tags text-primary"></i></span>
                @if (isset($tags))
                @foreach($tags as $key => $tag)
                <div class="form-control">
                    
                    <label class="form-control" for="{{$tag}}" class="pt-2 text-capitalize">
                        {!! Form::checkbox('tag_id[]', $key, false, ['class' => ' text-capitalize', 'id' => $tag]) !!}
                        {{$tag}}
                    </label>
                </div>
                @endforeach
                @endif
            </div>
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Add News', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            <script>
            // document.querySelectorAll('select option')[0].value = "111";
            </script>
        </div>
        {{-- form end --}}
    </div>
</div>
@stop