@extends('layouts.client.index', ['title' => 'Account Settings'])
@section('content')

<div class="container">
    <div class="ac-h-path-bar">
        <div class="full-path">
            <p class="inactive-path">Account /</p>
            <p class="active-path">Details</p>
        </div>
        <div class="account-holder-name-wrapper">
            <p>Welcome</p>
            <div class="a-h-name">
                <p>{{ $user->name }}</p>
            </div>
        </div>
    </div>
    <div class="main-account-controller">
        <div class="quick-access-wrapper">
            <ul class="ul-section">
                Manage My Account
                <li class="ac-nav-item">
                    <a class="" href="javascript:void(0)">My Profile</a>
                </li>
            </ul>
            <ul class="ul-section">
                My Orders
                <li class="ac-nav-item">
                    <a class="" href="javascript:void(0)">Comming Soon!</a>
                </li>
            </ul>
            <ul class="ul-section">
                Wishlists
                <li class="ac-nav-item">
                    <a class="" href="javascript:void(0)">Comming Soon!</a>
                </li>
            </ul>
        </div>
        <form class="edit-profile-wrapper" action="{{ route('dist.update_profile') }}" method="POST">
            @csrf
            <div class="your-profile-text">
                <h5>Edit Your Profile</h5>
            </div>
            <div class="ac-full-width-wrapper">
                <p>Full Name</p>
                <div class="inputfield-wrapper">
                    <input class="inputfield @error('fullname') is-invalid @enderror" name="fullname" type="text" placeholder="Enter Fullname" value="{{ $user->name }}" />
                    @error('fullname')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="ac-input-field-wrapper">
                <div class="ac-wrapper">
                    <p>Email</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield"
                            type="text"
                            placeholder="example@gmail.com"
                            value="{{ $user->email }}"
                            disabled="true" />
                    </div>
                </div>

                <div class="ac-wrapper">
                    <p>Phone</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield @error('phone') is-invalid @enderror"
                            type="text"
                            name="phone"
                            placeholder="Enter Phone Number"
                            value="{{ $user_meta->phone }}"
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
                        value="{{ $user_meta->address }}"
                        />
                        @error('address')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                </div>
            </div>
            <div class="ac-input-field-wrapper">
                <div class="ac-wrapper">
                    <p>City</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield @error('city') is-invalid @enderror"
                            type="text"
                            placeholder="Enter city name"
                            name="city"
                            value="{{ $user_meta->city }}"/>
                            @error('city')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                </div>

                <div class="ac-wrapper">
                    <p>Post Code</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield @error('post_code') is-invalid @enderror"
                            type="text"
                            name="post_code"
                            placeholder="Enter Postal Code"
                            value="{{ $user_meta->post_code }}"
                            />
                            @error('post_code')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="ac-full-width-wrapper">
                <p>Change Password</p>
                <div class="inputfield-full-width-wrapper">
                    <input
                        class="full-inputfield"
                        type="password"
                        name="current_password"
                        placeholder="Current Password"
                        />
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
            <div class="save-cancel-wrapper">
                <a href="{{url()->previous()}}" class="cancel btn" type="button">Cancel</a>
                <button class="save btn" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@endsection