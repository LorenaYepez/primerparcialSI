<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminActividadController extends Controller
{
    public function index(){
         $actividad = DB::table("actividades")
                  ->select("actividades.*", "materias.nombre as nombremateria")
                  ->join("materias", "materias.idMateria", "=", "actividades.idMateria")
                  ->get();
                 return view("admin.actividad.index",["Actividades"=>$actividad]);
    }

    public function vistacrear(){
        $materia = DB::table("materias")->get();
            return view("admin.actividad.crear",["materias"=>$materia]);
     }

   public function crear(Request $request)
   {
       // Crear la tarea
       DB::table("actividades")->insert([
           "Titulo" => $request->input("titulo"),
           "Descripcion" => $request->input("descripcion"),
           "FechaInicio" => $request->input("fechainicio"),
           "FechaFin" => $request->input("fechafin"),
           "IdMateria" => $request->input("idMateria"),
       ]);

       // Mostrar un mensaje de éxito o redirigir a otra página
       return redirect()->route("admin.actividad")->with("success", "Tarea creada correctamente");

   }
}
