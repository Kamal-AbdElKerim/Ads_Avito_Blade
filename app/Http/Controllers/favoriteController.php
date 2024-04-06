<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favoriteController extends Controller
{
    public function favorite($id_ads){

        $id_user = Auth()->id();

        $favorite =new favorite();
        $favorite->UserID = $id_user;
        $favorite->AdID = $id_ads;
        $favorite->save();
        session()->flash('success', 'Ad added to favorites!');


        return redirect()->back();
    }

    public function remove_favorite($id)
    {
        $favorite = favorite::where('AdID', $id)
            ->where('UserID', Auth::id())
            ->first();

        if ($favorite) {
            $favorite->delete();

            session()->flash('success', 'Ad removed from favorites successfully.');
        } else {
            session()->flash('error', 'Ad is not in your favorites.');
        }

        return redirect()->back();
    }

    public function list_favorite()
    {
        $userId = Auth::id();

        $favorites = Favorite::where('UserID', $userId)
        ->with(['ads.categories', 'ads.images'])

        ->paginate(10);

        // dd($favorites);
        return view('frontend.pages.pages_settings.layout_settings', [
            'favorites' => $favorites
        ]);
    }
}
