<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function announcementList(){
        $announcements = Announcement::latest()->paginate(20);
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();
        return view('client.announcement', [
            'announcements'=> $announcements,
            'categories'=> $categories,
            'subcategories'=> $subcategories
        ]);
    }
    public function announcement_view($id){
        $announcement = Announcement::whereId($id)->first();
        $categories = Product_category::all();
        $subcategories = Product_sub_category::all();
        return view('client.announcement_view', [
            'announcement'=> $announcement,
            'categories'=> $categories,
            'subcategories'=> $subcategories
        ]);
    }
}
