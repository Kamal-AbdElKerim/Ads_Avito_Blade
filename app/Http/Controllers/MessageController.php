<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function Messages_list(){

       

        return view('frontend.pages.pages_settings.layout_settings');

    }
  
}
