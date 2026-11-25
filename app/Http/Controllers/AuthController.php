<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'usuario' => ['required', 'string'],
            'contraseña' => ['required', 'string'],
        ]);

        $usuario = Usuario::where('usuario', $request->input('usuario'))->first();

        if (! $usuario || ! Hash::check($request->input('contraseña'), $usuario->contraseña)) {
            return response()->json([
                'message' => 'Credenciales inválidas.',
            ], 401);
        }

        $token = JWTAuth::fromUser($usuario);

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'usuario' => $usuario->load('rol'),
        ]);
    }

    public function me()
    {
        return response()->json(
            auth('api')->user()->load('rol')
        );
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json([
            'message' => 'Sesión cerrada correctamente.',
        ]);
    }
}