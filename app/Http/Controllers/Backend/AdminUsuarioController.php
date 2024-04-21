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
public function crear(Request $request)
{
    //hasta autrita ya confirmamos que llegaron los avlores 
    
    // echo '<pre>' ;
    // print_r($request->all() );
    // echo '<pre>'; 
    // return 1;
   // Crear la tarea
   // el estatos no debe haver al momento de registrar ya que l yusuario ya nace con un 
   // estado valido o activo 

   
    // aqui debes obtener la contraseña y encriptarla y guarla en laravel 
//    $lcContraseña=$request->input("password");
//    $lcContraseña= bcrypt($lcContraseña);
   DB::table("users")->insert([
       "id" => $request->input("IdUsuario"),
       "name" => $request->input("Nombre"),
       "apellido" => $request->input("Apellido"),
       "role" => $request->input("Role"),
    //    "password" => $lcContraseña,
       "password"=> bcrypt($request->password),
       "email" => $request->input("Email"),
   ]);

   // Mostrar un mensaje de éxito o redirigir a otra página
   return redirect()->route("admin.usuario")->with("success", "Tarea creada correctamente");
}

public function vistacrear(Request $request){
    /*$usuario = DB::table("users")
    ->select("*")
    ->get();*/
   return view("admin.usuario.crear");
}

public function  vistaeditar($id){ 
    $usuario = DB::table("users")->where("id",$id)->first();
    return view("admin.usuario.editar",["usuario"=>$usuario ]);
    }

 public function editar(Request $request){
       // Actualizar la tarea

       $id=$request->input("idUsuario");
    //    $lcContraseña=$request->input("password");
    //    $lcContraseña= bcrypt($lcContraseña);
       $actualizacion= DB::table("users")->where("id", $id)->update([
        "name" => $request->input("Nombre"),
        "apellido" => $request->input("Apellido"),
        "role" => $request->input("Role"),
        "password"=> bcrypt($request->password),
        "email" => $request->input("Email"),
    ]);

   

    if ($actualizacion) {
        return back()->with('success', 'Usuario editada correctamente');
    } else {
        return back()->withInput()->withErrors(['error' => 'No se pudo editar al usuario']);
    }
 }

}
