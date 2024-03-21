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
                    <a class="" href="#">My Profile</a>
                </li>
                <li class="ac-nav-item">
                    <a class="" href="#logo">My Address Book</a>
                </li>
                <li class="ac-nav-item">
                    <a class="" href="#">Payment Options</a>
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
        <form class="edit-profile-wrapper"  method="POST">
            @csrf
            <div class="your-profile-text">
                <h5>Edit Your Profile</h5>
            </div>
            <div class="ac-full-width-wrapper">
                <p>Full Name</p>
                <div class="inputfield-wrapper">
                    <input class="inputfield @error('fname') is-invalid @enderror" name="fullname" type="text" placeholder="Enter Fullname" value="{{ $user->name }}" />
                    @error('fname')
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
                            class="inputfield"
                            type="text"
                            name="phone"
                            placeholder="Enter Phone Number"
                            value="{{ $user_meta->phone }}"
                            />
                    </div>
                </div>
            </div>
            <div class="ac-full-width-wrapper">
                <p>Address</p>
                <div class="inputfield-full-width-wrapper">
                    <input
                        class="full-inputfield"
                        type="text"
                        name="address"
                        placeholder="Mirpur 10 Round,Dhaka,1216,"
                        value="{{ $user_meta->address }}"
                        />
                </div>
            </div>
            <div class="ac-input-field-wrapper">
                <div class="ac-wrapper">
                    <p>City</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield"
                            type="text"
                            placeholder="Enter city name"
                            name="city"
                            value="{{ $user_meta->city }}"/>
                    </div>
                </div>

                <div class="ac-wrapper">
                    <p>Post Code</p>
                    <div class="inputfield-wrapper">
                        <input
                            class="inputfield"
                            type="text"
                            name="phone"
                            placeholder="Enter Postal Code"
                            value="{{ $user_meta->post_code }}"
                            />
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