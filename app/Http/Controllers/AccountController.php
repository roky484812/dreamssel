<?php

namespace App\Http\Controllers;

use App\Models\profile_meta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    

    public function create_user(Request $req){
        $req->validate([
            'fname'=> 'required|max:20|min:3',
            'lname'=> 'nullable|max:20|min:3',
            'email'=> 'required|email|email:rfc,dns|unique:users,email',
            'address' => 'required',
            'phone'=> 'required|numeric',
            'password'=> 'required|confirmed|min:6|max:32'
        ]);
        $user = new User();
        $user->fname = $req->fname;
        $user->lname = $req->lname;
        $user->email = $req->email;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->password = Hash::make($req->password);
        if($user->save()){
            return redirect()->back()->with([
                'success'=> 'Signup Successful.'
            ]);
        }else{
            return redirect()->back()->with([
                'error'=> 'Try Agian.'
            ]);
        }
    }

    public function updateData(Request $request)
    {
        // Validate the incoming request if needed
        $validatedData = $request->validate([
            'fname' => 'required|max:20|min:3',
            'phone' => 'required|numeric',
            'address' => 'required',
            'password' => 'nullable|confirmed|min:6|max:32',
            'password_confirmation' => 'nullable|same:password',
            // Add validation rules for other fields
        ]);

        $logged_inUser = Auth::user();

        // Find the model instance by ID
        $user = User::whereId($logged_inUser->id)->first();

        // Check if the current password is correct
        if($validatedData['password']){
            if (!Hash::check($validatedData['current_password'], $user->password)) {
                return redirect()->back()->with([
                    'error' => 'Current password is incorrect.'
                ]);
            }
            $user->password = Hash::make($validatedData['password']);
        }

        // Update the fields with the new values
        $user->name = $validatedData['fname'];
        profile_meta::updateOrCreate(
            [
                'user_id'=> $logged_inUser->id,
                'key'=> 'phone'
            ],[
                'value'=> $validatedData['phone']
            ]
        );
        profile_meta::updateOrCreate(
            [
                'user_id'=> $logged_inUser->id,
                'key'=> 'address'
            ],[
                'value'=> $validatedData['address']
            ]
        );
        // Save the changes to the database
        if ($user->save()) {
            return redirect()->back()->with([
                'success' => 'Updated Successfully.'
            ]);
        } else {
            return redirect()->back()->with([
                'error' => 'Try Again.'
            ]);
        }
    }
    
}
