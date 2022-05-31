<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $token=$user->createToken("auth_token")->plainTextToken;

        $user->save();
        return response()->json([
            "status"=>1,
            "msg"=>"Registrado correctamente",
            "token"=>$token,
            "data"=>$user,
        ]);
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $user = User::where("email", "=", $request->email)->first();

        if(isset($user->id)){
            if(Hash::check($request->password, $user->password)){
                $token=$user->createToken("auth_token")->plainTextToken;
                return response()->json([
                    "status"=>1,
                    "msg"=>"Inico de sesion correctamente",
                    "token"=>$token,
                    "data"=>$user,
                ]);
            }else{
                return response()->json([
                    "status"=>0,
                    "msg"=>"La contraseña es incorrecta",
                ], 404);
            }
        }else{
            return response()->json([
                "status"=>0,
                "msg"=>"Usuario no registrado",
            ], 404);
        }
    }

    public function userProfile(){
        return response()->json([
            "status"=>0,
            "msg"=>"Informacion del usuario",
            "data"=>auth()->user(),
        ]);
    }

    public function logout(){
        auth()->user()->tokens()->delete();

        return response()->json([
            "status"=>1,
            "msg"=>"Cierre de sesion",
        ]);
    }
}
