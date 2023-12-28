@extends('layouts.auth')
    <!-- Section: Design Block -->
    @section('content')
        <div class="container">
            <div class="forms-container">
                <div class="signin-signup">
                    <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                        <img src="{{asset('assets/img/auth/logo.svg')}}" class="logo-sign-in" alt="">
                        @csrf
                        @if(Session::has('error'))
                            <p class="text-center text-danger">
                                {{Session::get('error')}}
                            </p>
                        @endif
                        <h2 class="title">Sign in</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="email" value="{{old('email')}}" id="email" name="email" class="@error('email') is-invalid @enderror" placeholder="Enter your email"/>
                            @error('email')
                                <p class="invalid-feedback">{{$errors->first('email')}}</p>
                            @enderror
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" value="{{old('password')}}" id="password" name="password" class="@error('password') is-invalid @enderror" placeholder="Enter your password"/>
                            @error('password')
                                <p class="invalid-feedback">{{$errors->first('password')}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Login" class="btn solid" />
                        <p class="social-text">Or Sign in with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </form>
                    <form method="POST" action="{{route('register.dist')}}" class="sign-up-form">
                        @csrf
                        <img src="{{asset('assets/img/auth/logo.svg')}}" class="logo-sign-in" alt="">
                        <h2 class="title">Sign up</h2>
                        <div class="input-field">
                            <i class="fas fa-user"></i>
                            <input type="text" placeholder="Enter your username" value="{{old('signup_usernmae')}}" name="signup_username" class="@error('signup_username') is-invalid @enderror" />

                            @error('signup_username')
                                <p class="invalid-feedback">{{$errors->first('signup_username')}}</p>
                            @enderror
                        </div>
                        <div class="input-field">
                            <i class="fas fa-envelope"></i>
                            <input type="email" value="{{old('signup_email')}}" name="signup_email" class="@error('signup_email') is-invalid @enderror" placeholder="Enter your email"/>
                            @error('signup_email')
                                <p class="invalid-feedback">{{$errors->first('signup_email')}}</p>
                            @enderror
                        </div>
                        <div class="input-field">
                            <i class="fas fa-lock"></i>
                            <input type="password" value="{{old('signup_password')}}" name="signup_password" class="@error('signup_password') is-invalid @enderror" placeholder="Enter your password"/>
                            @error('signup_password')
                                <p class="invalid-feedback">{{$errors->first('signup_password')}}</p>
                            @enderror
                        </div>
                        <input type="submit" class="btn" value="Sign up" />
                        <p class="social-text">Or Sign up with social platforms</p>
                        <div class="social-media">
                            <a href="#" class="social-icon">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
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