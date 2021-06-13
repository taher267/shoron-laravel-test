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
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    @if ($errors->any())
                                        @foreach ($errors->all() as $err)
                                        <div class="alert alert-danger">
                                            {{$err}}
                                        </div>
                                        @endforeach
                                    @endif
                                    {!! Form::open(['route' => 'admin.authenticate' ,'method' => 'post', 'class' => 'user']) !!}
                                    <div class="form-group">
                                        {!! Form::email('email', NULL, ['placeholder' => 'Email Address...', 'class' => 'form-control form-control-user', 'id' => 'exampleInputEmail']) !!}
                                    </div>
                                    {{-- @if ($errors->has('email')) {
                                           <div class="alert alert-danger">
                                        {{$errors->has('email')}} --}}
                                    <div class="form-group">
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control form-control-user', 'id' => 'exampleInputPassword']) !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                        </div>
                                    </div>
                                    {!! Form::submit('Login', ['class' => 'btn btn-primary btn-user btn-block']) !!}
                                    {!! Form::close() !!}
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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