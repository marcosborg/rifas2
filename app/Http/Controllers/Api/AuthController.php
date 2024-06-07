<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User,email',
            'password' => 'required|min:6',
            'password2' => 'required|same:password',
        ], [], [
                'name' => 'Nome',
                'email' => 'Email',
                'password' => 'Password',
                'password2' => 'Confirmação da password',
            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->roles()->attach(2); // Simple user role

    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);
        if (!auth()->attempt($credentials)) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => [
                    'password' => [
                        'Invalid credentials'
                    ],
                ]
            ], 422);
        }

        $user = User::where('email', $request->email)->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token' => $authToken,
        ]);
    }

    public function user(Request $request)
    {

        $bearerToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearerToken);
        $user = $token->tokenable;
        return $user;

    }

    public function updateUser(Request $request)
    {
        $bearerToken = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearerToken);
        $user = $token->tokenable;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return $user;
    }
}