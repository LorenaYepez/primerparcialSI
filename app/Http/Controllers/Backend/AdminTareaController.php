<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AdminTareaController extends Controller
{
    public function index(){
      //  $tarea = DB::table("tarea")->get();
       //return view("admin.tarea.index");
       $tareas = DB::table("tarea")
                ->select("tarea.*", "materia.nombre as nombremateria")
                ->join("materia", "materia.idMateria", "=", "tarea.idMateria")
                ->get();
               return view("admin.tarea.index",["Tareas"=>$tareas]);
    }
    public function vistacrear(){
         $materia = DB::table("materia")->get();
         //return view("admin.tarea.index");
       
                 return view("admin.tarea.crear",["materias"=>$materia]);
      }

    public function crear(Request $request)
    {
  
        // Validar la solicitud

        // Crear la tarea
        DB::table("tarea")->insert([
            "titulo" => $request->input("titulo"),
            "descripcion" => $request->input("descripcion"),
            "fechaentrega" => $request->input("fechaentrega"),
            "idMateria" => $request->input("idMateria"),
        ]);

        // Mostrar un mensaje de éxito o redirigir a otra página
        return redirect()->route("admin.tarea")->with("success", "Tarea creada correctamente");

    }

    public function  vistaeditar($id){ 
        $tarea = DB::table("tarea")->where("idTarea",$id)->first();
        $materia = DB::table("materia")->get();

        return view("admin.tarea.editar",["tarea"=>$tarea  ,"materias"=>$materia]);

        
    }

     public function editar(Request $request){
           // Actualizar la tarea
       
           $id=$request->input("idTarea");
           $actualizacion= DB::table("tarea")->where("idTarea", $id)->update([
            "titulo" => $request->input("titulo") ,
            "descripcion" => $request->input("descripcion"),
            "fechaentrega" => $request->input("fechaentrega"),
            "idMateria" => $request->input("idMateria"),
        ]);

        if ($actualizacion) {
            return back()->with('success', 'Tarea editada correctamente');
        } else {
            return back()->withInput()->withErrors(['error' => 'No se pudo editar la tarea']);
        }
     }
}