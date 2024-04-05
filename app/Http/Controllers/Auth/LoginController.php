<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('frontend.pages.Auth.login');
    }

    public function login(Request $request)
    { {
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            if (Auth::attempt($credentials, true)) {
                $request->session()->regenerate();
                if (Auth::user()->role == 'admin') {
                    return redirect()->intended('Dashboard/Home');
                } else {
                    return redirect()->intended('home')->with('success', 'You have successfully logged in!');
                }
            }

            Session::flash('error', 'Email or password is incorrect.');

            return redirect()->back();
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->regenerate();

        return redirect()->route('login');
    }

    public function ProfileSettings(){
        return view('frontend.pages.pages_settings.layout_settings',[
            'User' => User::where('id', '=', Auth()->id())->first(),
        ]);
    

    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ], [
            'name.required' => 'The name field is required.',
            'phone.required' => 'The phone field is required.',
        ]);

        $user = User::find(auth()->id());
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        // Validate the form data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|different:current_password',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $user = User::find(auth()->id());

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        // Update the user's password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect the user back with a success message
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
}
