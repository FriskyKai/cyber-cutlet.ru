<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Регистрация
    public function signUp(AuthRequest $request) {
        $user = User::create($request->all());
        $user->save();

        return response()->json([
            'userId' => $user->id
        ])->setStatusCode(201);
    }

    // Авторизация
    public function login(LoginRequest $request) {
        $credentials = request(['phone', 'password']);

        if(!Auth::attempt($credentials)) {
            throw new ApiException(401, 'Unauthorized ');
        }

        return response()->json([
            'token' => Auth::user()->generateToken()
        ])->setStatusCode(200);
    }

    // Выход
    public function logout(Request $request) {
        $request->user()->forceFill(['remember_token' => ''])->save();
    }
}
