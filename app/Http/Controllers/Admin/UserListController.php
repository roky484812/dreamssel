<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function userList(){
        return view('admin.userList');
    }
}
