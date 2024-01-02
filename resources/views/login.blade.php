@extends('layouts.auth')
    <!-- Section: Design Block -->
    @section('content')
        <div class="container @if(Session::has('page')) sign-up-mode @endif">
            <div class="forms-container">
                <div class="signin-signup">
                    <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                        <img src="{{asset('assets/img/auth/logo.svg')}}" class="logo-sign-in" alt="Dreamssel Logo">
                        @csrf
                        <h2 class="title">Sign in</h2>
                        @if(Session::has('error'))
                            <p class="invalid-feedback">
                                {{Session::get('error')}}
                            </p>
                        @endif
                        <div class="input-field @error('email') is-invalid @enderror">
                            <i class="fas fa-user"></i>
                            <input type="email" value="{{old('email')}}" id="email" name="email"  placeholder="Enter your email"/>
                        </div>
                        @error('email')
                            <p class="invalid-feedback">{{$errors->first('email')}}</p>
                        @enderror
                        <div class="input-field @error('password') is-invalid @enderror">
                            <i class="fas fa-lock"></i>
                            <input type="password" value="{{old('password')}}" id="password" name="password" class="inputPass" placeholder="Enter your password"/>
                            <button class="eyeBtn" type="button">
                                <span class="openEye"><i class="fas fa-eye"></i></span>
                                <span class="closeEye"><i class="fas fa-eye-slash"></i></span>	
                            </button>
                        </div>
                        @error('password')
                            <p class="invalid-feedback">{{$errors->first('password')}}</p>
                        @enderror
                        <input type="submit" value="Login" class="btn solid" />
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="{{route('login.facebook')}}" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{route('login.google')}}" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </form>
                    <form method="POST" action="{{route('register.dist')}}" class="sign-up-form">
                        @csrf

                        <img src="{{asset('assets/img/auth/logo.svg')}}" class="logo-sign-in" alt="">
                        <h2 class="title">Sign up</h2>
                        @if(Session::has('signup_success'))
                            <p class="text-center text-danger">
                                {{Session::get('signup_success')}}
                            </p>
                        @endif
                        @if(Session::has('signup_error'))
                            <p class="text-center invalid_feedback">
                                {{Session::get('signup_error')}}
                            </p>
                        @endif
                        <div class="input-field @error('signup_username') is-invalid @enderror"">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Enter your username" value="{{old('signup_username')}}" name="signup_username" class="@error('signup_username') is-invalid @enderror" />
                        </div>
                        @error('signup_username')
                            <p class="invalid-feedback">{{$errors->first('signup_username')}}</p>
                        @enderror
                        <div class="input-field @error('signup_email') is-invalid @enderror"">
                            <i class="fas fa-envelope"></i>
                            <input type="email" value="{{old('signup_email')}}" name="signup_email" class="@error('signup_email') is-invalid @enderror" placeholder="Enter your email"/>
                        </div>
                        @error('signup_email')
                            <p class="invalid-feedback">{{$errors->first('signup_email')}}</p>
                        @enderror
                        <div class="input-field @error('signup_password') is-invalid @enderror"">
                            <i class="fas fa-lock"></i>
                            <input type="password" value="{{old('signup_password')}}" name="signup_password" class="inputPass @error('signup_password') is-invalid @enderror" placeholder="Enter your password"/>
                            <button class="eyeBtn" type="button">
                                <span class="openEye"><i class="fas fa-eye"></i></span>
                                <span class="closeEye"><i class="fas fa-eye-slash"></i></span>	
                            </button>
                        </div>
                        @error('signup_password')
                            <p class="invalid-feedback">{{$errors->first('signup_password')}}</p>
                        @enderror
                        <input type="submit" class="btn" value="Sign up" />
                        <p class="social-text">Or Sign up with social platforms</p>
                        <div class="social-media">
                            <a href="{{route('login.facebook')}}" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="{{route('login.google')}}" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>New here ?</h3>
                        <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                            ex ratione. Aliquid!
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            Sign up
                        </button>
                    </div>
                    <img src="{{asset('assets/img/auth/login1.svg')}}" class="image" alt="" />
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>One of us ?</h3>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                            laboriosam ad deleniti.
                        </p>
                        <button class="btn transparent" id="sign-in-btn">
                            Sign in
                        </button>
                    </div>
                    <img src="{{asset('assets/img/auth/register1.svg')}}" class="image" alt="" />
                </div>
            </div>
        </div>
    @endsection