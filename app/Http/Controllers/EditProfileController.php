<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
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
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }



}
