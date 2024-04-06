<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function Dashboard_user(){

        $user = Auth::user();
        $notifications = $user->notifications()->orderBy('created_at', 'desc')->get();
        $num_ads_pending = ad::where('UserID',Auth()->id())->where('status','pending')->get();
        $num_ads_approved = ad::where('UserID',Auth()->id())->where('status','approved')->get();
        $num_ads_sold = ad::where('UserID',Auth()->id())->where('status','sold')->get();
        $ads = Ad::with(['images'])
          ->where('UserID',Auth()->id())
          ->orderByDesc('id')
          ->limit(4)
          ->get();
        
        return view('frontend.pages.pages_settings.layout_settings',[
            'notifications' => $notifications,
            'ads' => $ads,
            'num_ads_pending' => $num_ads_pending,
            'num_ads_approved' => $num_ads_approved,
            'num_ads_sold' => $num_ads_sold,
        ]);
    }

    public function remove_notification($id){

       $notification = Notification::find($id);

       if (!$notification) {
           return redirect()->with('error', 'Notification not found.');
       }

       // Check if the authenticated user owns the notification
       if (auth()->user()->id !== $notification->user_id) {
           return redirect()->with('error', 'You are not authorized to remove this notification.');
       }

       // Delete the notification
       $notification->delete();

       return redirect()->back();
    }
}
