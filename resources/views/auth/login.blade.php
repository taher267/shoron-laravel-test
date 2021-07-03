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
                                    {{-- error message --}}
                                    @if ( Session()->get('fail') )
                                        <span class="alert alert-success">{{Session()->get('fail')}}</span>
                                    @endif
                                    {!! Form::open(['route' => 'auth.check' ,'method' => 'post', 'class' => 'user']) !!}
                                    

                                    <div class="form-group">
                                        {!! Form::email('email', old('email'), ['placeholder' => 'Email Address...', 'class' => 'form-control form-control-user', 'id' => 'exampleInputEmail']) !!}

                                        @error ('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="input-group">
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control form-control-user', 'id' => 'logInPassword', ]) !!}
                                        <span class="input-group-text" id="eye-addon" onclick='return Passshow()'><i class="bi bi-eye-slash" id="togglePassword"></i></span>
                                        

                                        
                                        @error ('password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
                                    <script type="text/javascript">
                                    </script>
                                    <div class="text-center">
                                        <a class="small" href="#">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('auth.register')}}">I don't have an Account, Create Now!</a>
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

