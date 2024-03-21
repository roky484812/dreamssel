@extends('layout.master', ['title' => 'Account'])





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
                    <p>{{ $user->fname }} {{ $user->lname }}</p>
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
                        <a class="" href="{{ route('home.pendingOrder') }}">Pending</a>
                    </li>
                    <li class="ac-nav-item">
                        <a class="" href="{{ route('home.confirmedOrder') }}">Confirmed</a>
                    </li>
                    <li class="ac-nav-item">
                        <a class="" href="{{ route('home.cancelledOrder') }}">Cancelled</a>
                    </li>
                </ul>
                <ul class="ul-section">
                    Wishlists
                    <li class="ac-nav-item">
                        <a class="" href="{{ route('home.favPage') }}">My Favorite</a>
                    </li>
                </ul>
            </div>
            <form class="edit-profile-wrapper" action="{{ route('account.update') }}" method="POST">
                @csrf

                <div class="your-profile-text">
                    <h5>Edit Your Profile</h5>
                </div>
                <div class="ac-input-field-wrapper">
                    <div class="ac-wrapper">
                        <p>First Name</p>
                        <div class="inputfield-wrapper">
                            <input class="inputfield @error('fname') is-invalid @enderror" name="fname" type="text"
                                placeholder="Farhan" value="{{ $user->fname }}" />
                            @error('fname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="ac-wrapper">
                        <p>Last Name</p>
                        <div class="inputfield-wrapper">
                            <input class="inputfield @error('lname') is-invalid @enderror" name="lname" type="text"
                                placeholder="Sadik" value="{{ $user->lname }}" />
                            @error('lname')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="ac-input-field-wrapper">
                    <div class="ac-wrapper">
                        <p>Email</p>
                        <div class="inputfield-wrapper">
                            <input class="inputfield" type="text" name="email" placeholder="example@gmail.com"
                                value="{{ $user->email }}" disabled="true" />
                        </div>
                    </div>
                    <div class="ac-wrapper">
                        <p>Phone</p>
                        <div class="inputfield-wrapper">
                            <input class="inputfield" type="text" name="phone" placeholder="+8801516XXXXXXX"
                                value="{{ $user->phone }}" />
                        </div>
                    </div>
                </div>
                <div class="ac-full-width-wrapper">
                    <p>Address</p>
                    <div class="inputfield-full-width-wrapper">
                        <input class="full-inputfield" type="text" name="address"
                            placeholder="Mirpur 10 Round,Dhaka,1216," value="{{ $user->address }}" />
                    </div>
                </div>
                <div class="ac-full-width-wrapper">
                    <p>Change Password</p>
                    <div class="inputfield-full-width-wrapper">
                        <input class="full-inputfield" type="password" name="current_password"
                            placeholder="Current Password" />
                    </div>
                </div>
                <div class="ac-full-width-wrapper">
                    <div class="inputfield-full-width-wrapper">
                        <input class="full-inputfield @error('password') is-invalid @enderror" type="password"
                            name="password" placeholder="New Password" />
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="ac-full-width-wrapper">
                    <div class="inputfield-full-width-wrapper">
                        <input class="full-inputfield" type="password" name="password_confirmation"
                            placeholder="Confirm New Password" />
                    </div>
                </div>
                <div class="bottom-ac-page-wrapper d-flex  justify-content-between">
                  <a href="{{ route('logout') }}" class="cancel btn mt-4" type="button">Log Out</a>
                    <div class="save-cancel-wrapper">
                        <a href="{{ url()->previous() }}" class="cancel btn" type="button">Cancel</a>
                        <button class="save btn" type="submit">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
