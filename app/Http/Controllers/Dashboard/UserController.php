<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function Users(){
        return view('Dashboard.users',[
            'users' => User::withTrashed()->latest()->where('role','user')->paginate(10),
        ]);
    

    }

    public function block_user($id){
        $user = User::withTrashed()->findOrFail($id);
      
        if ($user->deleted_at == null) {
            $user->delete();
        }else{
            $user->restore();
        }
        return redirect()->back();
    }
}
