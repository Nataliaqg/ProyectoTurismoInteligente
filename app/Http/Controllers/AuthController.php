<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    //
    public function register(Request $req)
    {
        //validaciones
        $rules = [
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|confirmed|string|min:6'
        ];
        
        /* $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } */
        //crear nuevio usuario en la tabla usuario


        $user = User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => Hash::make($req->password)
        ]);
        $token = $user->createToken('Personal Access Token')->plainTextToken;
        $response = ['user' => $user, 'token' => $token];
        return $user;
    }

    public function login(Request $req)
    {
        // validacion entradas
        /* $rules = [
            'email' => 'required',
            'password' => 'required|string'

        $req->validate($rules); */
        // Encontrar  email del usuario en la tabla de usuario
        $user = User::where('email', $req->email)->first();
        // Si el email del usuario es encontrado y la contraseña es correcta
        if ($user && Hash::check($req->password, $user->password)) {
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            $response = ['user' => $user, 'token' => $token];
            return $user;
        }
        $response = ['message' => 'Email o Contraseña incorrecta'];
        return "";
    }
}
