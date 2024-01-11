<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\profile_meta;
use App\Models\User;

class AdminController extends Controller
{
    public function profile(){
        // $user = Auth::user();
        return view('admin.profile');
    }
    public function user_meta($user_id){
        $user_metas = profile_meta::where('user_id', $user_id)->get();
        $user = [];
        foreach($user_metas as $user_meta){
            $user[$user_meta['key']] = $user_meta['value'];
        }
        return $user;
    }
    public function edit_profile(){
        $user_meta = $this->user_meta(1);
        return view('admin.editprofile', ['user_meta'=> $user_meta]);
    }
}
