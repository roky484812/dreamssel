<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcementList(){
        $announcements = Announcement::latest()->paginate(20);
        return view('client.announcement', ['announcements'=> $announcements]);
    }
}
