<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ad;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdsController extends Controller
{
    public function Ads(){
        return view('Dashboard\Ads',[
            'Ads' => ad::latest()->paginate(10),

        ]);
    }

    public function approve($id){
        $ads = ad::findOrFail($id);
        $ads->status = 'approved';
        $ads->save();
        $user = $ads->users;
        if (!$user) {
            abort(404, 'User not found for this ad.');
        }
        Notification::create([
            'user_id' => $user->id,
            'type' => 'info',
            'message' => 'Your ad has been displayed.',
        ]);
        return redirect()->back();
    }
    public function reject($id){
        $ads = ad::findOrFail($id);
        $ads->status = 'rejected';
        $ads->save();
        $user = $ads->users;
        if (!$user) {
            abort(404, 'User not found for this ad.');
        }
        Notification::create([
            'user_id' => $user->id,
            'type' => 'info',
            'message' => 'Your ad has been disapproved.',
        ]);
        return redirect()->back();

    }

    
}
