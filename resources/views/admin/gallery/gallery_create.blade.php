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
            @isset( $pageHead )
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
            {!! Form::open([ 'route' => 'gallery.store', 'method' => 'POST' , 'enctype' => "multipart/form-data" ]) !!}
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('course_id', $classes, null, ['class' => 'form-control text-capitalize', 'placeholder' => 'Select Class']) !!}
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                            {!! Form::file('image', ['class' => 'form-control ']) !!}
                            
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('cat_id', $classes, null, ['class' => 'form-control ', 'placeholder' => 'Select Ctegory']) !!}
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fab fa-get-pocket text-primary"></i><sup class="text-danger">*</sup></span>
                            {!! Form::select('status', ($dashboardData['authUser']->role <=2)?['1' => 'Publish', '0' => 'Draft']:['0' => 'Draft'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Phote</button>
                        </div>
                        {!! Form::close() !!}
        </div>
    </div>
</div>
@stop