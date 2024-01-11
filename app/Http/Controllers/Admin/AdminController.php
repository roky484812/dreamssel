<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

class AdminController extends Controller
{
    public function profile(){
        // $user = Auth::user();
        return view('admin.profile');
    }

    public function edit_profile(){
        return view('admin.editprofile');
    }
}
