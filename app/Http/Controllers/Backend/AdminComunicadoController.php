<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminComunicadoController extends Controller
{
    public function index(){
        $comunicado = DB::table("notificaciones")
                 ->select("notificaciones.*", "estudiantes.Nombre as nombreusuario", "estudiantes.Apellido as apellidousuario", "estudiantes.Grado as gradousurio")
                 ->join("estudiantes", "estudiantes.IdEstudiante", "=", "notificaciones.IdUsuario")
                 ->get();
                return view("admin.comunicado.index",["Comunicados"=>$comunicado]);
   }
}
