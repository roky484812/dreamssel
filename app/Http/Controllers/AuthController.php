<?php

namespace App\Http\Controllers;

use App\Models\Temp_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginView(){
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $req){
        $req->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        $Credential = $req->only('email', 'password');
        if(Auth::attempt($Credential)){
            $route = $this->redirectDash();
            return redirect($route);
        }else{
            return back()->with('error', 'You have passed invalid credential.');
        }
    }

    public function register(Request $req){
        $validator = Validator::make($req->all() ,[
            'signup_username'=> 'required|unique:users,username|min:4|string',
            'signup_email'=> 'required|email|email:rfc,dns|unique:users,email',
            'signup_password'=> 'required|min:6|max:32'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('page', 'signup');
        }
        $temp_user = new Temp_user();
        $temp_user->username = $req->input('signup_username');
        $temp_user->email = $req->input('signup_email');
        $temp_user->password = Hash::make($req->input('signup_password'));
        if($temp_user->save()){
            return back()->with('signup_success', 'Lets verify your email address.')->with('page', 'signup');
        }else{
            return back()->with('signup_errors', 'Something went wrong while registering user.')->with('page', 'signup');
        }
    }

    public function redirectDash(){
        $redirect = '';
        if(Auth::user() && Auth::user()->role == 1){
            $redirect = route('admin.dashboard');
        }else if(Auth::user() && Auth::user()->role == 2){
            $redirect = route('editor.dashboard');
        }else{
            $redirect = route('dist.dashboard');
        }
        return $redirect;
    }
}
