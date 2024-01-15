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
            
        ]);
    }
}
