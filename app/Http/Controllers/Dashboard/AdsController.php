<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ad;
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
        return redirect()->back();
    }
    public function reject($id){
        $ads = ad::findOrFail($id);
        $ads->status = 'rejected';
        $ads->save();
        return redirect()->back();

    }

    
}
