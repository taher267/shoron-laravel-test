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
            @if (isset( $mode ) && 'edit' == $mode)
            {!! Form::model($address, [ 'route' => ['contact.update', $address->id], 'method' => 'PUT' , 'enctype' => "multipart/form-data" ]) !!}
            @else
            {!! Form::open(['route' => 'contact.store', 'method'=>'post', 'enctype'=>"multipart/form-data"]) !!}
            @endif
            
            {{-- {{$address}} --}}
            
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-map-marker-alt text-primary"></i></span>
                @if (isset($mode) && isset($address->locationsign) )
                <span class="input-group-text">
                    <img style="width:28px" src="{{asset('storage/assets/contact/' . $address->locationsign)}}">
                </span>
                @endif
                
                {!! Form::file('locationsign', ['class' => 'form-control ']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-map-marker-alt text-primary"></i></span>
                
                {!! Form::text('location', NULL, ['class' => 'form-control ', 'placeholder' => 'Office Location']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-phone-alt text-primary"></i></span>
                    @if (isset($mode) && isset($address->phonesign) )
                    <span class="input-group-text">
                    <img style="width:28px" src="{{asset('storage/assets/contact/' . $address->phonesign)}}">
                    </span>
                    @endif
                
                {!! Form::file('phonesign', ['class' => 'form-control ']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-phone-alt text-primary"></i></span>
                {!! Form::text('phone_no', NULL, ['class' => 'form-control ', 'placeholder' => 'Phone No.']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-image text-primary"></i></span>
                    @if (isset($mode) && isset($address->emailsign) )
                    <span class="input-group-text">
                        <img style="width:28px" src="{{asset('storage/assets/contact/' . $address->emailsign)}}"></span>
                    @endif
                
                {!! Form::file('emailsign', ['class' => 'form-control ']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-envelope text-primary"></i></span>
                {!! Form::email('email', NULL, ['class' => 'form-control ', 'placeholder' => 'Email No.']) !!}
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fas fa-question text-primary"></i></span>
                {{-- {{$address->where}} --}}
                {!! Form::select('where', ['contact-page' => 'Contact Page', 'footer' => 'Page Footer'], (isset($address->where)) ? $address->where : 'contact-page', [ 'class' => 'form-control', 'placeholder' =>  'Where Address?']) !!}
            </div>
            <div class="input-group mb-3">
                {!! Form::submit((isset($mode) && 'edit'==$mode)? 'Update Contact' : 'Add Contact', ['class' => 'form-control btn btn-primary', 'title'=>'For Contact page']) !!}
            </div>
            {!! Form::close() !!}
            {{-- <script>
            document.querySelectorAll('select option')[0].value = "111";
            </script> --}}
        </div>
    </div>
</div>
@stop