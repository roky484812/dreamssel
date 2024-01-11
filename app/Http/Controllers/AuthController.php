<?php

namespace App\Http\Controllers;

use App\Mail\DistributorSignup;
use App\Models\Temp_user;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
            'password'=> 'required|min:5|max:32||regex:/^[^\s]+$/'
        ],[
            'password.regex' => 'The password field cannot contain spaces.'
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
            'signup_username'=> 'required|unique:users,username|min:4|string|regex:/^[^\s]+$/',
            'signup_email'=> 'required|email|email:rfc,dns|unique:users,email',
            'signup_password'=> 'required|min:5|max:32|regex:/^[^\s]+$/'
        ], [
            'signup_username.regex' => 'The username cannot contain spaces.',
            'signup_password.regex' => 'The signup password cannot contain spaces.'
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->with('page', 'signup');
        }
        $temp_user = new Temp_user();
        $temp_user->username = $req->input('signup_username');
        $temp_user->email = $req->input('signup_email');
        $temp_user->password = $req->input('signup_password');

        $mail = $req->input('signup_email');
        $subject = 'Dreamssel account verification.';
        $title = 'Verify your distribution account.';
        $token = $this->send_mail($mail, $subject, $title);
        $temp_user->token = $token;
        if($token){
            if($temp_user->save()){
                return back()->with('signup_success', 'Lets verify your email address.')->with('page', 'signup');
            }else{
                return back()->with('signup_error', 'Something went wrong while registering user.')->with('page', 'signup');
            }
        }else{
            return back()->with('signup_error', 'Error while sending mail. Contact Administrator.')->with('page', 'signup');
        }
    }

    public function send_mail($mail, $sub, $title){
        $token = Str::random(32);
        $message = [];
        $message['subject'] = $sub;
        $message['title'] = $title;
        $message['token'] = $token;
        try{
            Mail::to($mail)->send(new DistributorSignup($message));
            return $token;
        }catch(Exception $e){
            return 0;
        }
    }

    public function email_verify(Request $req){
        $temp_user = Temp_user::where('token', $req->input('token'))->first();
        if($temp_user){
            $localDateTime = now()->timezone('Asia/Dhaka')->format('Y-m-d H:i:s');
            $user = new User();
            $user->username = $temp_user->username;
            $user->email = $temp_user->email;
            $user->role = $temp_user->role;
            $user->password = Hash::make($temp_user->password);
            $user->email_verified_at = $localDateTime;
            $user->created_at = $temp_user->created_at;
            $user->updated_at = $temp_user->updated_at;
            if($user->save()){
                $temp_user->delete();
                return 'Email verified successfuly.';
            }else{
                return 'Something went wrong.';
            }
            
        }else{
            return "Can't verify your email address. Maybe your token is expired or already been verified.";
        }
    }


    public function login_with_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

    public function login_with_facebook_callback(){
        $user = Socialite::driver('facebook')->user();
        $findUser = User::where('facebook_id', $user->id);
        if($findUser->exists()){
            Auth::login($findUser->first());
            $route = $this->redirectDash();
            return redirect($route);
        }else{
            $newUser = User::updateOrCreate(
                ['email' => $user->email],
                [
                    'facebook_id'=> $user->id,
                    'password'=> Hash::make($user->id.$user->email)
                ]
            );

            Auth::login($newUser);
            $route = $this->redirectDash();
            return redirect($route);
        }
    }

    public function login_with_google(){
        return Socialite::driver('google')->redirect();
    }

    public function login_with_google_callback(){
        $user = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $user->id);
        if($findUser->exists()){
            Auth::login($findUser->first());
            $route = $this->redirectDash();
            return redirect($route);
        }else{
            $newUser = User::updateOrCreate(
                ['email' => $user->email],
                [
                    'google_id' => $user->id,
                    'password' => Hash::make($user->id.$user->email),
                ]
            );
            Auth::login($newUser);
            $route = $this->redirectDash();
            return redirect($route);
        }
    }

    public function change_password(Request $req){
        $req->validate([
            'current_password'=> 'required||regex:/^[^\s]+$/|min:5|max:32',
            'new_password'=> 'required|regex:/^[^\s]+$/|min:5|max:32|confirmed',
        ], [
            'current_password.regex' => 'The current password field cannot contain spaces.',
            'new_password.regex' => 'The new password field cannot contain spaces.'
        ]);
        // $valiator = Validator::make($req->all(), $roles);
        // if($valiator->fails()){
        //     return back()->withErrors($valiator);
        // }

        $user = Auth::user();
        if(!Hash::check($req->input('current_password'), $user->password)){
            return back()->with('error', 'Current password is incorrect');
        }
        $user->update([
            'password'=> Hash::make($req->input('new_password'))
        ]);
        return back()->with('success', 'You have successfuly changed your password.');
    }

    public function change_profile_picture(Request $req){
        $req->validate([
            'profile_picture'=> 'image|mimes:jpeg,jpg,png'
        ],[
            'profile_picture.mimes' => 'The profile picture field must be a file of type: jpeg, jpg, png.'
        ]);
        $user = Auth::user();
        if($req->hasFile('profile_picture')){
            // create image manager with desired driver
            $manager = new ImageManager(new Driver());
            $profile_picture = $req->file('profile_picture');
            $extension = $profile_picture->getClientOriginalExtension();
            $profile_picture_name = time().'.'.$extension;
            $profile_picture_path = '/images/profile_pictures/'.$profile_picture_name;
            $profile_picture_dest = public_path().$profile_picture_path;
            // read image from file system
            $image = $manager->read($profile_picture);
            $image->cover(300, 300);
            $image->save($profile_picture_dest, 50);
            User::whereId($user->id)->update([
                'profile_picture'=> $profile_picture_path
            ]);
            return redirect()->back()->with('success', 'You have changed your profiie picture successfuly.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
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
