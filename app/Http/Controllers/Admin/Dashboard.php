<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
        $editors = User::leftjoin('user_roles', 'user_roles.id', 'users.role')
        ->where('users.role', 2)
        ->limit(5)
        ->select('users.*', 'user_roles.role')->get();
        return view('admin.dashboard', ['editors' => $editors]);
    }
}
