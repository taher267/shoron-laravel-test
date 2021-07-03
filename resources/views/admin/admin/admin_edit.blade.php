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
        {{-- {{$news_edit->id}} --}}
        
        <div class="col-lg-8 justify-content-between">
            {!! Form::model($user, [ 'route' => ['user.update', $user->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-user text-primary"></i></span>
                {!! Form::text('name', NULL, ['class' => 'form-control text-capitalize', 'placeholder' => 'Edit Name']) !!}
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span>
                {!! Form::email('email', NULL, ['class' => 'form-control', 'placeholder' => 'Edit Email']) !!}
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fab fa-critical-role text-primary"></i></span>
                {!! Form::select('role',$roles, NULL, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Option']) !!}
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-arrow-up text-primary"></i></span>
                {!! Form::select('status', ['0'=> 'deactive','1'=> 'active'], NULL, ['class' => 'form-control text-capitalize', 'placeholder' => 'Change Status']) !!}
            </div>
            {{-- <img class="w-50" src="{{asset('storage/assets/user/'. $user->image)}}" alt="Missing user Image"> --}}

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>

                {!! Form::file('image', ['class' => 'form-control ']) !!}
            </div>
            
            <div class="input-group mb-3">
                {!! Form::submit('Update User', ['class' => 'form-control btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop