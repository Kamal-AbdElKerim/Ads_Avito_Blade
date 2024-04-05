<?php

namespace App\Http\Controllers;

use App\Models\ad;
use App\Models\categorie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.pages.Home' ,[
            'categories' => categorie::all(),
        ]); 
    }

    public function SinglPage($id){

        return view('frontend.pages.Single_page',[
            'ads' => ad::with(['categories', 'users', 'images', 'tags'])->findOrFail($id)
 
         ]);
    }
}
