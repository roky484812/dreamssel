<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function userList(){
        return view('admin.userList');
    }
    public function addUserView(){
        return view('admin.add_user');
    }
    public function addUser(Request $req){
        $req->validate([
            'fullname'=> 'max:100',
            'username'=> 'required|regex:/^[^\s]+$/',
            'email'=> 'required|email|email:rfc,dns|unique:users,email',
            'password'=> 'required|regex:/^[^\s]+$/|min:5|max:32|confirmed',
            'phone'=> 'max:15',
            'address'=> 'max:100',
            'city'=> 'max:50',
            'post_code'=> 'max:6'
        ], [
            'password.regex'=> 'The current password field cannot contain spaces.'
        ]);
        
    }
}
