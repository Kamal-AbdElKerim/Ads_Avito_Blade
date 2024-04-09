<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('frontend.pages.Auth.Register');
    }

    public function store(Request $request)
{
    // Validate the form data
    
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:255|unique:users',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 

    ]);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    } else {
        $imageName = 'profile-icon.jpg'; 
    }

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->phone = $request->phone; 
    $user->image = $imageName; 


    $user->save();

    Auth::login($user);

    return redirect()->route('Home')->with('success', 'You have successfully logged in!');;
}

    
}
