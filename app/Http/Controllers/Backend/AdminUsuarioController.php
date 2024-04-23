<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



public function loginapi(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        $token = $user->createToken('auth_token');

        return response()->json([
            'message' => 'Successfully logged in!',
            'user' => $user,
            'token' => $token->plainTextToken
        ], 200);
    } else {
        return response()->json([
            'message' => 'Invalid credentials.'
        ], 401);
    }
}



}
