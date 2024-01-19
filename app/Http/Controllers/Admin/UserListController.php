<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\profile_meta;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserListController extends Controller
{
    public function userList(){
        $users = User::select('users.id', 'users.name', 'users.username', 'users.email', 'users.profile_picture', 'users.is_active', 'user_roles.role as role_name')
        ->leftJoin('user_roles', 'user_roles.id', 'users.role')
        ->where('users.role', '!=', '1')
        ->with('profileMeta') // Eager load the profileMeta relationship
        ->get();
        
        $users = $users->map(function ($user) {
            $userMeta = $user->profileMeta->pluck('value', 'key')->toArray();
            
            $keys = ['phone', 'address', 'city', 'post_code'];
        
            // Ensure every key exists and set value to empty string if not present
            foreach ($keys as $key) {
                $user->setAttribute('user_meta.' . $key, $userMeta[$key] ?? '');
            }
            unset($user->profileMeta);
            return $user;
        });
    
        // return $users;
        return view('admin.userList', ['users_data'=> $users]);
    }
    public function addUserView(){
        return view('admin.add_user');
    }

    public function updateUserView($user_id){
        $user = User::select('users.*', 'user_roles.role as role_name')
        ->leftJoin('user_roles', 'user_roles.id', 'users.role')
        ->where('users.id', $user_id)
        ->with('profileMeta')
        ->first();
        
        $user_meta = $user->profileMeta->pluck('value', 'key')->toArray();
        $keys = ['phone', 'address', 'city', 'post_code'];
        // Ensure every key exists and set value to empty string if not present
        foreach ($keys as $key) {
            $user->setAttribute('user_meta.' . $key, $user_meta[$key] ?? '');
        }
        unset($user->profileMeta);
        
        return view('admin.edit_user', ['user_data'=> $user]);
    }

    public function updateUser(Request $req){
        $req->validate([
            'user_id'=> 'required',
            'fullname'=> 'max:100',
            'email'=> 'required|email|email:rfc,dns|unique:users,email,'.$req->user_id,
            'password'=> 'nullable|regex:/^[^\s]+$/|min:5|max:32|confirmed',
            'role' => 'in:2,3',
            'phone'=> 'nullable|max:15',
            'address'=> 'nullable|max:100',
            'city'=> 'nullable|max:50',
            'post_code'=> 'nullable|max:6',
            'is_active'=> 'in:0,1'
        ], [
            'password.regex'=> 'The current password field cannot contain spaces.'
        ]);
        try {
            $user_id = $req->user_id;
            $pass = [];
            if($req->input('password')){
                $pass['password'] = Hash::make($req->input('password'));
            }
            
            User::whereId($user_id)->update(array_merge([
                'name'=> $req->input('fullname'),
                'email'=> $req->input('email'),
                'role'=> $req->input('role'),
                'is_active'=> $req->input('is_active')
            ], $pass));

            profile_meta::updateOrCreate(
                [
                    'user_id'=> $user_id,
                    'key'=> 'phone'
                ],[
                    'value'=> $req->input('phone')
                ]
            );

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

            profile_meta::updateOrCreate(
                [
                    'user_id'=> $user_id,
                    'key'=> 'post_code'
                ],[
                    'value'=> $req->input('post_code')
                ]
            );
            return redirect()->route('admin.userlist')->with('success', 'User updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.userlist')->with('error', "Can't update user. Something went wrong.");
        }
    }

    public function user_status(Request $req){
        $req->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $user = User::whereId($req->input('user_id'))->first();
        $update_user = User::whereId($user->id)->update(['is_active' => !$user->is_active]);
        if($update_user){
            $message = !$user->is_active ? 'User Activated Successfully.' : 'User Blocked Successfully.';
            return redirect()->back()->with('success', $message);
        }else{
            return redirect()->back()->with('error', "Can't update user status.");
        }
    }

    public function user_delete(Request $req){
        $req->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $delete_user = User::whereId($req->input('user_id'))->delete();
        if($delete_user){
            return redirect()->back()->with('success', 'An user delete successfully.');
        }else{
            return redirect()->back()->with('error', "Can't delete user right now.");
        }
    }

    public function addUser(Request $req){
        $req->validate([
            'fullname'=> 'max:100',
            'username'=> 'required|regex:/^[^\s]+$/',
            'email'=> 'required|email|email:rfc,dns|unique:users,email',
            'password'=> 'required|regex:/^[^\s]+$/|min:5|max:32|confirmed',
            'role' => 'in:2,3',
            'phone'=> 'max:15',
            'address'=> 'max:100',
            'city'=> 'max:50',
            'post_code'=> 'max:6',
            'is_active'=> 'in:0,1'
        ], [
            'password.regex'=> 'The current password field cannot contain spaces.',
            'role.in' => 'The selected role is invalid.'
        ]);
        try {
            $user = new User();
            $user->name = $req->input('fullname');
            $user->username = $req->input('username');
            $user->email = $req->input('email');
            $user->password = Hash::make($req->input('password'));
            $user->role = $req->input('role');
            $user->is_active = $req->input('is_active');
            $save_user = $user->save();
            $user_id = $user->id;
            if($save_user){
                if($req->input('phone')){
                    profile_meta::Create(
                        [
                            'user_id'=> $user_id,
                            'key'=> 'phone',
                            'value'=> $req->input('phone')
                        ]
                    );
                }
    
                if($req->input('address')){
                    profile_meta::Create(
                        [
                            'user_id'=> $user_id,
                            'key'=> 'address',
                            'value'=> $req->input('address')
                        ]
                    );
                }
    
                if($req->input('city')){
                    profile_meta::Create(
                        [
                            'user_id'=> $user_id,
                            'key'=> 'city',
                            'value'=> $req->input('city')
                        ]
                    );
                }
    
                if($req->input('post_code')){
                    profile_meta::Create(
                        [
                            'user_id'=> $user_id,
                            'key'=> 'post_code',
                            'value'=> $req->input('post_code')
                        ]
                    );
                }
                return redirect()->route('admin.userlist')->with('success', 'You have successfully added a new user.');
            }else{
                return redirect()->back()->with('error', 'Can not create a new user');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }
}
