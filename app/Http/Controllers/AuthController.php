<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => [''],
                'password' => ['Email ou senhas incorretos'],
            ]);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;

        return response()->json([
            'data' => [
                'user' => $user,
                'token' => $token,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();

        $user->tokens()
            ->where('id', explode('|', $request->bearerToken())[0])
            ->delete();

        return response()->json([
            'message' => 'Logout realizado com sucesso'
        ]);
    }

    public function session(Request $request)
    {
        $user = User::find(Auth::user()->id);

        return response()->json([
            'data' => [
                'user' => $user,
                'token' => $request->bearerToken()
            ]
        ]);
    }
}
