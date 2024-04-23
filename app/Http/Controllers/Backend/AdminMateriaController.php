<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminMateriaController extends Controller
{
    //
    public function index(){
        $materia = DB::table("materias")
                 ->select("*")
                 ->get();
                return view("admin.materia.index",["Materias"=>$materia]);
   }

   public function vistacrear(Request $request){
   return view("admin.materia.crear");
   }

   public function crear(Request $request)
   {
   DB::table("materias")->insert([
       "Nombre" => $request->input("titulo"),
       "Descripcion" => $request->input("descripcion"),
   ]);

   // Mostrar un mensaje de éxito o redirigir a otra página
   return redirect()->route("admin.materia")->with("success", "Tarea creada correctamente");
   }

   public function  vistaeditar($id){ 
    $materia = DB::table("materias")->where("IdMateria",$id)->first();
    return view("admin.materia.editar",["materia"=>$materia ]);
    }

 public function editar(Request $request){
       // Actualizar la materia
       $id=$request->input("idMateria");
       $actualizacion= DB::table("materias")->where("IdMateria", $id)->update([
        "Nombre" => $request->input("titulo"),
        "Descripcion" => $request->input("descripcion"),
    ]);
    if ($actualizacion) {
        return back()->with('success', 'Usuario editada correctamente');
    } else {
        return back()->withInput()->withErrors(['error' => 'No se pudo editar al usuario']);
    }
 }
}
