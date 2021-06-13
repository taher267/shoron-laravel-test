@extends('admin.admin_layout')
@section('main_contant')
<div class="container-fluid">
    @if(session('msg'))
    <div class="alert alert-primary">
        {{session('msg')}}
    </div>
    @endif
    <div class="row">
        <div class="col-lg-6 justify-content-between">
            {!! Form::open(['route' => 'day.store']) !!}
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-plus text-primary"></i></span>
                <input type="text" name="day" class="form-control" placeholder="Day Name" aria-label="day">
                <input type="submit" class="btn btn-success" value="Add Day" aria-label="Server">
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop