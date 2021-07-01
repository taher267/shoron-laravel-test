@extends('layout.main')
@section('main_content')
<div class="login_wrapper">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">{{$pageHead}}</h1>
                                    </div>
                                    @if ($errors->has('failed'))
                                        <span class="alert alert-danger d-block">{{ $errors->first('failed') }}</span>
                                    @endif

                                    {!! Form::open(['route' => 'auth.save' ,'method' => 'post', 'class' => 'user']) !!}
                                    @if ( Session()->get('success') )
                                        <span class="alert alert-success">{{Session()->get('success')}}</span>
                                    @endif

                                    @if ( Session()->get('fail') )
                                        <span class="alert alert-success">{{Session()->get('fail')}}</span>
                                    @endif
                                    <div class="form-group">
                                        {!! Form::text('name', old('name'), ['placeholder' => 'Enter Full Name...', 'class' => 'form-control form-control-user', 'id' => 'exampleInputname']) !!}
                                        @error('name')<span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="form-group">
                                        {!! Form::email('email', old('email'), ['placeholder' => 'Enter Email Address...', 'class' => 'form-control form-control-user', 'id' => 'exampleInputEmail']) !!}
                                        @error('email')<span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control form-control-user', 'id' => 'exampleInputPassword']) !!}
                                        
                                        @error('password')<span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        {!! Form::password('confirmPass', ['placeholder' => 'Confirm Password', 'class' => 'form-control form-control-user', 'id' => 'exampleInputconfirmPassword']) !!}
                                        
                                        @error('confirmPass')<span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    {!! Form::submit('Register', ['class' => 'btn btn-primary btn-user btn-block']) !!}
                                    {!! Form::close() !!}
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{route('auth.login')}}">I Already have an Account | Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop