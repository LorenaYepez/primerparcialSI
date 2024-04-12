<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function index(){
        return view("admin.profile.index");
    }
    public function updateProfile(Request $request){
      $user = Auth::user();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->user->save();

        return redirect()->back();
    }

    public function updatePassword(Request $request){

        $request->validate(
            [
                "current_password"=> ["required","current_password"],
                "password"=> ["required","confirmed","min:8"],
            ]);
        $request->user()->update([
            "password"=> bcrypt($request->password),
        ]);
        return redirect()->back();
    }
}