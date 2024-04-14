<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminEventosController extends Controller
{
    public function index(){
        // print_r( $eventos = DB::table("eventos")
        // ->select("*")
        // ->get());
            $evento = DB::table("eventos")
                ->select("*")
                ->get();
                return view("admin.calendario.index",["Eventos"=>$evento]);

   }
}
