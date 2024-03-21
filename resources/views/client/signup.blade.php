
@extends('layout.master',['title'=>'SignIn'])





@section('content')

<div class="container mb-5">
    <div class="signup-img-wrapper">
      <div class="left-img">
        <img src="{{asset('assets/client/images/dl.beatsnoop 1.png')}}" alt="" />
      </div>
      <div class="signup">
        <form class="signup-form-wrapper" action="{{route('register.client')}}" method="POST">
          @csrf
          <div class="your-profile-text">
            <h5>Sigh Up</h5>
          </div>
          <div class="ac-input-field-wrapper">
            <div class="ac-wrapper">
              <p>First Name</p>
              <div class="inputfield-wrapper">
                <input class="inputfield @error('fname') is-invalid @enderror" name="fname" type="text" placeholder="Farhan" />
                @error('fname')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
            </div>
            <div class="ac-wrapper">
              <p>Last Name</p>
              <div class="inputfield-wrapper">
                <input class="inputfield @error('lname') is-invalid @enderror" name="lname" type="text" placeholder="Sadik" />
                @error('lname')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="ac-input-field-wrapper">
            <div class="ac-wrapper">
              <p>Email</p>
              <div class="inputfield-wrapper">
                <input
                  class="inputfield @error('email') is-invalid @enderror"
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
            <div class="ac-wrapper">
              <p>Phone</p>
              <div class="inputfield-wrapper">
                <input
                  class="inputfield @error('phone') is-invalid @enderror"
                  type="text"
                  name="phone"
                  placeholder="+8801516503109"
                />
                @error('phone')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
              </div>
            </div>
          </div>
          <div class="ac-full-width-wrapper">
            <p>Address</p>
            <div class="inputfield-full-width-wrapper">
              <input
                class="full-inputfield @error('address') is-invalid @enderror"
                type="text"
                name="address"
                placeholder="Mirpur 10 Round,Dhaka,1216,"
              />
              @error('address')
                  <div class="invalid-feedback">
                    {{$message}}
                  </div>
                @enderror
            </div>
          </div>
          
          <div class="ac-full-width-wrapper">
            <div class="inputfield-full-width-wrapper">
              <input
                class="full-inputfield @error('password') is-invalid @enderror"
                type="password"
                name="password"
                placeholder="New Password"
              />
              @error('password')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
          </div>
          <div class="ac-full-width-wrapper">
            <div class="inputfield-full-width-wrapper">
              <input
                class="full-inputfield"
                type="password"
                name="password_confirmation"
                placeholder="Confirm New Password"
              />
            </div>
          </div>

          <div class="red-to-signup">
            <p>Already have an account?</p>
            <a href="{{route('home.signInPage')}}" class="cancel btn" type="button">Sign In</a>
          </div>
          
          <div class="save-cancel-wrapper">
            <a href="{{url()->previous()}}" class="cancel btn" type="button">Cancel</a>
            <button class="save btn" type="submit">Create Account</button>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection

@section('custom_css')
<link rel="stylesheet" href="{{asset('assets/client/css/signin.css')}}">
@endsection