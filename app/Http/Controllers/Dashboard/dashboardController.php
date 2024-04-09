<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\ad;
use App\Models\User;
use App\Models\categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function dashboard(){

        $users = User::where('id', '!=', Auth()->id())->get();
        $ads = ad::all();
        $ads_sold = ad::where('status','sold')->get();
        $categories = categorie::all();


        return view('Dashboard.dashboard',[
            'users' => $users,
            'ads' => $ads,
            'ads_sold' => $ads_sold,
            'categories' => $categories,
        ]);
    }
}
