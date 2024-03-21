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
    public function announcement_view($id){
        $announcement = Announcement::whereId($id)->first();
        return view('client.announcement_view', ['announcement'=> $announcement]);
    }
}
