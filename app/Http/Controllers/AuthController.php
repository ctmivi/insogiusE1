<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PerfilxPermiso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Método para registrar usuarios
    public function register(Request $request)
    {
        // Validar los datos del request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'alias' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $validatedData['name'],
            'alias' => $validatedData['alias'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'gender' => $validatedData['gender'],
            'birthdate' => $validatedData['birthdate'],
        ]);

        // Generar un token de acceso personal
        $token = $user->createToken('auth_token')->plainTextToken;
        // ...

        // Retornar el usuario y el token
        return response()->json([
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer',
    ]);
    }



    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para iniciar sesión
    public function login(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar autenticar al usuario
        if (!Auth::attempt($validatedData)) {
            return response()->json(['message' => 'Credenciales inválidas'], 401);
        }

        // El usuario ha sido autenticado, obtener el modelo de usuario
        $user = Auth::user();
        $perxper = PerfilxPermiso::first();

        // Crear un nuevo token para el usuario
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar una respuesta JSON con el token y la información del usuario
        return response()->json([
            'user' => $user,
            'permiso' => $perxper,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);

        
    }

}
