<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard() {
        $user = Auth::user();
        $rolUsuario = "";
        if($user->role=="admin"){
            $rolUsuario="ADMIN";
        }else{
            $rolUsuario="PROFESOR";
        }
        return view("admin.dashboard");
    }

    public function login() {
        return view("admin.auth.login");
    }
}
