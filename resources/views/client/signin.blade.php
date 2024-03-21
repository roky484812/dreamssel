
@extends('layout.master',['title'=>'Sign In'])





@section('content')

<div class="container mb-5">
    <div class="signup-img-wrapper">
      <div class="left-img">
        <img src="{{asset('assets/client/images/dl.beatsnoop 1.png')}}" alt="" />
      </div>
      <div class="signup">
        <form class="signup-form-wrapper" action="{{route('login')}}" method="POST">
          @csrf
          <div class="your-profile-text">
            <h5>Sign In</h5>
          </div>
          <div class="ac-input-field-wrapper">
            <div class="ac-wrapper full-widh-wrapper">
              <p>Email</p>
              <div class="inputfield-wrapper @error('email') is-invalid @enderror">
                <input
                  class="inputfield  "
                  type="text"
                  name="email"
                  placeholder="example@gmail.com"
                />
                @error('email')
                <div class="invalid-feedback">
                  {{$message}}
                  
                </div>
                @enderror
              </div>
            </div>
           
          </div>
          <div class="ac-input-field-wrapper">
            <div class="ac-wrapper full-widh-wrapper ">
              <p>Password</p>
              <div class="inputfield-wrapper @error('password') is-invalid @enderror ">
                <input
                  class="inputfield"
                  type="password"
                  name="password"
                  placeholder="Password"
                />
                @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
              </div>
            </div>
            
          </div>
          
          <div class="red-to-signup">
            <p>Don't have any account?</p>
            <a href="{{route('home.signUpPage')}}" class="cancel btn" type="button">Sign Up</a>
          </div>
          
         
          
          <div class="save-cancel-wrapper">
            <a href="{{url()->previous()}}" class="cancel btn" type="button">Cancel</a>
            <button class="save btn" type="submit">Sign In</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('custom_css')
<link rel="stylesheet" href="{{asset('assets/client/css/signin.css')}}">
@endsection