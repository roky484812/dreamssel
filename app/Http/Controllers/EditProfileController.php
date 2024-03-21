<?php

namespace App\Http\Controllers;

use App\Mail\UpdateEmail;
use App\Models\profile_meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class EditProfileController extends Controller
{
    public function change_password(Request $req){
        $req->validate([
            'current_password'=> 'required||regex:/^[^\s]+$/|min:5|max:32',
            'new_password'=> 'required|regex:/^[^\s]+$/|min:5|max:32|confirmed',
        ], [
            'current_password.regex' => 'The current password field cannot contain spaces.',
            'new_password.regex' => 'The new password field cannot contain spaces.'
        ]);
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
            'profile_picture.mimes' => 'The profile picture must be a file of type: jpeg, jpg, png.'
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
            if(Auth::user()->profile_picture != 'images/profile_pictures/default.jpg'){
                try{
                    unlink(public_path().Auth::user()->profile_picture);
                }catch(Exception $e){
                    return back()->with('error', $e->getMessage());
                }
            }
            User::whereId($user->id)->update([
                'profile_picture'=> $profile_picture_path
            ]);
            return redirect()->back()->with('success', 'You have successfuly changed your profile picture.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function update_user_meta(Request $req){
        $req->validate([
            'fullname'=> 'string|min:3|max:100',
            'phone'=> 'min:10',
            'address'=> 'max:100',
            'city'=> 'max:50',
            'post_code'=> 'min:4|max:6'
        ]);

        try {
            $user_id = Auth::user()->id;
            User::whereId($user_id)->update([
                'name'=> $req->input('fullname')
            ]);
            if($req->input('phone')){
                profile_meta::updateOrCreate(
                    [
                        'user_id'=> $user_id,
                        'key'=> 'phone'
                    ],[
                        'value'=> $req->input('phone')
                    ]
                );
            }

            profile_meta::updateOrCreate(
                [
                    'user_id'=> $user_id,
                    'key'=> 'address'
                ],[
                    'value'=> $req->input('address')
                ]
            );

            profile_meta::updateOrCreate(
                [
                    'user_id'=> $user_id,
                    'key'=> 'city'
                ],[
                    'value'=> $req->input('city')
                ]
            );

            if($req->input('post_code')){
                profile_meta::updateOrCreate(
                    [
                        'user_id'=> $user_id,
                        'key'=> 'post_code'
                    ],[
                        'value'=> $req->input('post_code')
                    ]
                );
            }
            return redirect()->back()->with('success', 'You have successfuly updated your profile informations.');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function generateOpt(){
        $otp = rand(100000, 999999);
        return $otp;
    }
    public function send_otp(Request $req){
        $validator = Validator::make($req->all(), [
            'email'=> 'required|email|unique:users,email|email:rfc,dns'
        ]);
        $data = [];
        $data['email'] = $req->input('email');
        $data['otp'] = $this->generateOpt();
        $data['subject'] = 'Update Email OTP';
        if($validator->fails()){
            return response()->json(['errors'=>$validator->errors()], 422);
        }
        try{
            Mail::to($req->input('email'))->send(new UpdateEmail($data));
            $user_id = Auth::user()->id;
            User::whereId($user_id)->update([
                'remember_token'=> $data['otp']
            ]);
            return response()->json([
                'status'=> true,
                'message'=> 'OTP sent to '.$req->input('email').' successfuly.',
                'email'=> $data['email']
            ]);
        }catch(Exception $e){
            return response()->json([
                'status'=> false,
                'message'=> 'Something went wrong.',
                'errors'=> $e
            ], 500);
        }
    }
    public function update_email(Request $req){
        $req->validate([
            'otp'=> 'required',
            'email'=> 'required|email|unique:users,email|email:rfc,dns'
        ]);
        if($req->input('otp') == auth()->user()->remember_token){
            User::whereId(Auth::user()->id)->update(['email'=> $req->input('email')]);
            return redirect()->back()->with('success', 'Email Updated successfuly.');
        }else{
            return redirect()->back()->with('error', 'OTP did not matched.');
        }
    }

    public function user_meta($user_id){
        $user_metas = profile_meta::where('user_id', $user_id)->get();
        $user = [];
        foreach($user_metas as $user_meta){
            $user[$user_meta['key']] = $user_meta['value'];
        }
        if(empty($user['post_code'])){
            $user['post_code'] = '';
        }
        if(empty($user['address'])){
            $user['address'] = '';
        }
        if(empty($user['city'])){
            $user['city'] = '';
        }
        if(empty($user['phone'])){
            $user['phone'] = '';
        }
        return $user;
    }
    public function edit_distributor_profile(){
        $user_meta = (object)$this->user_meta(Auth::user()->id);
        return view('client.profile', compact('user_meta'));
    }
}
