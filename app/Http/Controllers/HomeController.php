<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\User;
use App\Models\categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $citys = json_decode(file_get_contents(public_path('json/city.json')), true);

        $ads = Ad::with(['users','categories', 'images', 'favorites'])
          ->where('status','approved')
          ->latest('created_at')
          ->limit(6)
          ->get();

          $num_categories = categorie::all();
          $num_ADS = ad::all();
          $num_users = User::all();



        return view('frontend.pages.Home' ,[
            'categories' => categorie::all(),
            'citys' => $citys,
            'ads' => $ads,
            'num_categories' => $num_categories,
            'num_ADS' => $num_ADS,
            'num_users' => $num_users,
        ]); 
    }

    public function SinglPage($id){

        return view('frontend.pages.Single_page',[
            'ads' => ad::with(['categories', 'users', 'images', 'tags'])->findOrFail($id)
 
         ]);
    }
}
