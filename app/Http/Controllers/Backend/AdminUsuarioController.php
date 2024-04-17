<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminUsuarioController extends Controller
{
    public function index(){
        $usuario = DB::table("users")
                 ->select("*")
                 ->get();
                return view("admin.usuario.index",["usuarios"=>$usuario]);
   }

   public function vistacrear(){
    $usuario = DB::table("users")
                 ->select("*")
                 ->get();
                return view("admin.usuario.index",["usuarios"=>$usuario]);
 }

public function crear(Request $request)
{
   // Crear la tarea
   DB::table("users")->insert([
       "id" => $request->input("IdUsuario"),
       "name" => $request->input("Nombre"),
       "apellido" => $request->input("Apellido"),
       "role" => $request->input("Role"),
       "status" => $request->input("Estado"),
       "email" => $request->input("Email"),
   ]);

   // Mostrar un mensaje de éxito o redirigir a otra página
   return redirect()->route("admin.usuario")->with("success", "Tarea creada correctamente");
}


}
