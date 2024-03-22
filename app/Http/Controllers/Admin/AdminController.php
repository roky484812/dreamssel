<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Models\profile_meta;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function profile(){
        $user_meta = $this->user_meta(Auth::user()->id);
        return view('admin.profile', ['user_meta'=> $user_meta]);
    }
    static function user_meta($user_id){
        $user_metas = profile_meta::where('user_id', $user_id)->get();
        $user = [];
        foreach($user_metas as $user_meta){
            $user[$user_meta['key']] = $user_meta['value'];
        }
        if(empty($user['post_code'])){
            $user['post_code'] = '';
        }
        if(empty($user['address'])){
            $user['address'] = '';
        }
        if(empty($user['city'])){
            $user['city'] = '';
        }
        if(empty($user['phone'])){
            $user['phone'] = '';
        }
        return $user;
    }
    public function edit_profile(){
        $user_meta = $this->user_meta(Auth::user()->id);
        return view('admin.editprofile', ['user_meta'=> $user_meta]);
    }
    public function flash_sale_timer() {
        $endTime = Setting::where('key', 'countdown_timer_end_time')->value('value');
        return view('admin.widgets.flashSale.timer', ['endTime' => $endTime]);
    }
    // Admin Controller
    public function setEndTime(Request $request) {
        $request->validate([
            'date' => 'required', // Validate the end time input
            'time' => 'required', // Validate the end time input
        ]);
        $endTime = $request->input('time') . ' ' . $request->input('date');

        // Store the end time of the countdown timer in the database
        Setting::updateOrCreate(['key' => 'countdown_timer_end_time'], ['value' => $endTime]);

        return redirect()->back()->with('success', 'Countdown timer end time has been updated successfully.');
    }
    // Scheduled Job or Background Task
    public function updateCountdownTimer() {
        $endTime = Setting::where('key', 'countdown_timer_end_time')->value('value');

        if ($endTime) {
            $remainingTime = strtotime($endTime) - time();

            // Update the cache or another database field with the remaining time
            Cache::put('countdown_timer_remaining_time', $remainingTime, now()->addMinutes(1));
        }
    }
}

