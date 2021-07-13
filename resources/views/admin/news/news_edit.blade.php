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
        {{-- {{dd($news_edit)}} --}}
        
        <div class="col-lg-8 justify-content-between">
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
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-object-group text-primary"></i></span>
                {!! Form::select('cat_id', $categories, null, ['class' => 'form-control text-capitalize ', 'placeholder' => 'Select Category', 'id'=> 'news_category']) !!}
            </div>
{{-- {{$news_edit->tags[0]->pivot->tag_id}}
<br>
{{$news_edit->tags[1]->pivot->tag_id}} --}}
            {{-- <div class="input-group mb-3">
                @if (isset($tags))                    
                    @foreach($tags as $key => $tag)
                        <span class="input-group-text form-control">
                            <label for="{{$tag}}" class="pt-2 text-capitalize">
                                @foreach ($news_edit->tags as $keys => $tagg)
                                    {!! Form::checkbox('tag_id[]', $key, ($tagg->pivot->tag_id == $key )? true: false, ['class' => ' text-capitalize', 'id' => $tag]) !!}
                                    {{$tag}}
                                @endforeach
                            </label>
                        </span>
                    @endforeach
                @endif
            </div> --}}

            <div class="input-group mb-3">
                @if (isset($tags))
                @php
                $keys =array_keys($tags);
                @endphp
                @for ($i = 0; $i < count($tags); $i++)              {{-- {{$i}} --}}          
                    <span class="input-group-text form-control">
                            <label for="{{--$tags[$keys[$i]]--}}" class="pt-2 text-capitalize">
                                @foreach ($news_edit->tags as $keys => $tagg)
                                    {!! Form::checkbox('tag_id[]', $keys, ($tagg->pivot->tag_id == $i )? true: false, ['class' => ' text-capitalize', 'id' => '$tag']) !!}
                                    {{$tagg->title}}
                                @endforeach
                            </label>
                        </span>
                    @endfor
                @endif
            </div>

{{-- {!! Form::checkbox($name, $value, $checked, []) !!} --}}
            
            <div class="input-group mb-3">
                
                {!! Form::submit('Update News', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
        @php
// Multidimensional array
// $superheroes = array(
//     "spider-man" => array(
//         "name" => "Peter Parker",
//         "email" => "peterparker@mail.com",
//     ),
//     "super-man" => array(
//         "name" => "Clark Kent",
//         "email" => "clarkkent@mail.com",
//     ),
//     "iron-man" => array(
//         "name" => "Harry Potter",
//         "email" => "harrypotter@mail.com",
//     )
// );
 
// Printing all the keys and values one by one
// $keys = array_keys($superheroes);
// for($i = 0; $i < count($superheroes); $i++) {
//     echo $keys[$i] . "{<br>";
//     foreach($superheroes[$keys[$i]] as $key => $value) {
//         echo $key . " : " . $value . "<br>";
//     }
//     echo "}<br>";
// }
$keys = array_keys($tags);
$count = count($tags);
for($i = 0; $i < $count; $i++) {
    // echo $i . '<br>';
    echo $keys[$i] . "{<br>";
    echo ($tags[$keys[$i]]);
    // foreach($tags[$keys[$i]] as $key => $value) {
    //     echo $key . " : " . $value . "<br>";
    // }
    echo "}<br>";
}
@endphp

    </div>
</div>
@stop