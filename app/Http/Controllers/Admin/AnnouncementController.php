<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcementList(){
        return view('admin.announcement');
    }
    public function add_announcement_view(){
        return view('admin.add_announcement');
    }
    public function add_announcement(Request $req){
        
    }
}
