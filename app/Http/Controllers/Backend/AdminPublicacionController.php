<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminPublicacionController extends Controller
{
    
    public function index(){
        $notificacion = DB::table("notificaciones")
                 ->select("notificaciones.*", "users.name as nombreusuario")
                 ->join("users", "users.id", "=", "notificaciones.IdUsuario")
                 ->get();
                return view("admin.publicacion.index",["Notificaciones"=>$notificacion]);
   }

   public function vistacrear(){
    $usuario = DB::table("users")->get();
        return view("admin.publicacion.crear",["usuarios"=>$usuario]);
 }

public function crear(Request $request)
{
    //print_r($request->all());
  
   // Crear la tarea
   DB::table("notificaciones")->insert([
       "Titulo" => $request->input("titulo"),
       "Descripcion" => $request->input("descripcion"),
       "Fecha" => $request->input("fecha"),
       "Tipo" => $request->input("tipo"),
       "IdUsuario" => $request->input("idUsuario"),
   ]);

   // Mostrar un mensaje de éxito o redirigir a otra página
  return redirect()->route("admin.publicacion")->with("success", "Tarea creada correctamente");
}

public function  vistaeditar($id){ 
    $notificacion = DB::table("notificaciones")->where("IdNotificacion",$id)->first();
    $usuario = DB::table("users")->get();

    return view("admin.publicacion.editar",["notificacion"=>$notificacion  ,"usuarios"=>$usuario]);
    
}

 public function editar(Request $request){
       // Actualizar la publicacion
       $id=$request->input("idNotificacion");
       $actualizacion= DB::table("notificaciones")->where("IdNotificacion", $id)->update([
        "Titulo" => $request->input("titulo"),
        "Descripcion" => $request->input("descripcion"),
        "Fecha" => $request->input("fecha"),
        "Tipo" => $request->input("tipo"),
        "IdUsuario" => $request->input("idUsuario"),
    ]);

    if ($actualizacion) {
        return back()->with('success', 'Tarea editada correctamente');
    } else {
        return back()->withInput()->withErrors(['error' => 'No se pudo editar la tarea']);
    }
 }
}
