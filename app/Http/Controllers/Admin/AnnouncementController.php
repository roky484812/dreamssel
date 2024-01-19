<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
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
        $req->validate([
            'title'=> 'required|max:100',
            'short_description'=> 'required|max:255',
            'description'=> 'required'
        ]);
        $announcement = new Announcement();
        $announcement->title = $req->input('title');
        $announcement->short_description = $req->input('short_description');
        $announcement->description = $req->input('description');
        if($announcement->save()){
            return redirect()->route('admin.announcement.list')->with('sucess', 'New announcement posted successfully.');
        }else{
            return redirect()->back()->with('error', "Can't post new announcement. Something went wrong.");
        }
    }
}
