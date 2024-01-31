<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnnouncementController extends Controller
{
    public function announcementList(){
        $announcements = Announcement::paginate(10);
        return view('admin.announcement', ['announcements'=> $announcements]);
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

    public function delete_announcement(Request $req){
        $req->validate([
            'announcement_id'=> 'required|exists:announcements,id'
        ]);
        $delete = Announcement::whereId($req->input('announcement_id'))->delete();
        if($delete){
            return redirect()->back()->with('success', 'An announcement deleted successfully.');
        }else{
            return redirect()->back()->with('error', 'Something went wrong.');
        }
    }

    public function update_announcement_view($announcement_id){
        $announcement = Announcement::whereId($announcement_id)->first();
        return view('admin.update_announcement', ['announcement'=> $announcement]);
    }

    public function update_announcement(Request $req){
        $req->validate([
            'announcement_id' => 'required|exists:announcements,id',
            'title'=> 'required|max:100',
            'short_description'=> 'required|max:255',
            'description'=> 'required'
        ]);
        $update = Announcement::whereId($req->input('announcement_id'))->update([
            'title'=> $req->input('title'),
            'short_description'=> $req->input('short_description'),
            'description'=> $req->input('description')
        ]);
        if($update){
            return redirect()->route('admin.announcement.list')->with('success', 'An announcement updated successfully');
        }else{
            return redirect()->back()->with('error', "Can't update announcement. Something went wrong.");
        }
    }
}
