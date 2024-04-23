<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminEventosController extends Controller
{
    public function index(){
        // print_r( $eventos = DB::table("eventos")
        // ->select("*")
        // ->get());
        $user = Auth::user();
        $tipo = 0;
        if ($user->role == "admin") {
            $tipo = 1;
          } else if ($user->role == "profesor") {
            $tipo = 2;
          } else {
            $evento = DB::table("eventos")
                ->select("*")
                ->get();
                return view("admin.calendario.index",["Eventos"=>$evento]);// This else block now handles all other roles
          }          
            $evento = DB::table("eventos")
                ->select("*")
                ->where('IdCalendario', $tipo) 
                ->get();
                return view("admin.calendario.index",["Eventos"=>$evento]);
   }


   public function crear(Request $request)
   {
    //    print_r($request->all());
      // Get the logged-in user instance
      $user = Auth::user();
      $tipo = 0;
      if($user->role=="admin"){
          $tipo=1;
      }else{
          $tipo=2;
      }
       // Crear la tarea
       DB::table("eventos")->insert([
           "Titulo" => $request->input("titulo"),
           "Descripcion" => $request->input("descripcion"),
           "FechaInicio" => $request->input("fechainicio"),
           "FechaFin" => $request->input("fechafin"),
           "Color" => $request->input("colores"),
           "IdCalendario" => $tipo,
       ]);
    //    Mostrar un mensaje de éxito o redirigir a otra página
      return redirect()->route("admin.calendario")->with("success", "Tarea creada correctamente");

   }
}
