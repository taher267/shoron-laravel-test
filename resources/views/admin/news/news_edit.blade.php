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
                <div class="col-lg-6"><h2 class="text-info mb-3">{{$pageHead}}</h2></div>
                
                @endisset
                <div class="col-lg-6 text-right">
                    {{-- <span>Edit id @isset($news_edit) {{$news_edit}} @endisset </span> --}}
                    <a class="btn animatedBtb" href="{{route('news.list')}}"><i class="fas fa-arrow-left text-primary" id="pot"></i> All news</a>
                </div>
                <style>
                .animatedBtb{
                    position: relative;
                    padding-left: 30px;
                }
                    #pot {
                        top: 32%;
                          bottom: 5%;
                          position: absolute;
                          -webkit-animation: linear infinite alternate;
                          -webkit-animation-name: run;
                          -webkit-animation-duration: 2s;
                        }
                        @-webkit-keyframes run {
                          0% {
                            left: 0;
                          }
                          50% {
                            right: 0;
                          }
                          100% {
                            left: 0;
                            , webkit-transform: scaleX(-1);
                          }
                        }
                </style>
            </div>
            @if ($errors->any())
            @foreach ($errors->all() as $err)
            <div class="alert alert-danger">{{$err}}</div>
            @endforeach
            @endif
        </div>
        {{-- {{dd($news_edit)}} --}}
        {{-- {{$news_edit}} --}}
        <div class="col-lg-8 justify-content-between" title="Edit id=">
            {!! Form::model($news_edit, [ 'route' => ['news.update', $news_edit->slug], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-heading text-primary"></i></span>
                {!! Form::text('title', NULL, ['class' => 'form-control ', 'placeholder' => 'News Title']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-audio-description text-primary"></i></span>
                {!! Form::text('description', NULL, ['class' => 'form-control ', 'placeholder' => 'News Desctiption']) !!}
            </div>
            
            <div class="input-group mb-3">
                <span class="input-group-text">
                    <img style="height: 20px; width:28px" src="{{asset('storage/assets/news/'. $news_edit->image)}}" alt="">
                </span>
                {!! Form::file('image', ['class' => 'form-control ', 'placeholder' => 'News Desctiption']) !!}
            </div>
            {{-- Category --}}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-object-group text-primary"></i></span>
                {!! Form::select('cat_id', $categories, null, ['class' => 'form-control text-capitalize ', 'placeholder' => 'Select Category', 'id'=> 'news_category']) !!}
            </div>
        </div>
        {{-- Tag list --}}
        <div class="input-group flex-nowrap mb-3">
            <span class="input-group-text" id="addon-wrapping"><i class="fas fa-tags"></i></span>
            
            @foreach ($tags as $keys => $tag)
            <div class="form-control">
                <label class="form-control" for="{{$tag->title}}">
                    <input type="checkbox" value="{{$tag->id}}"
                    @foreach($news_edit->tags as $newstag)
                    @if ($tag->title == $newstag->title)
                    checked
                    @else
                    @endif
                    @endforeach
                    name="tag_id[]"  id="{{$tag->title}}">
                    {{$tag->title}}
                </label>
            </div>
            @endforeach
            
        </div>
        <script>
        const bg = document.querySelector('input').checked = false;
        bg.classList.add('text-primary');
        </script>
        <div class="input-group mb-3">
            
            {!! Form::submit('Update News', ['class' => 'form-control btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    
</div>
</div>
@stop