<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perfil;
use Auth;

class PerfilController extends Controller
{
    public function show(Request $request)
    {
        // Obten el usuario autenticado usando el token del request
        $user = $request->token();

        // Verifica si el usuario está autenticado
        if (!$user) {
            return response()->json(['message' => 'No autenticado'], 401);
        }

        // Obtén el perfil del usuario autenticado
        $perfil = $user->perfil();

        // Retorna la respuesta JSON con la información del perfil
        return response()->json(['perfil' => $perfil]);
    }
}
