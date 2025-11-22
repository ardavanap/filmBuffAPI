<?php

namespace App\Http\Controllers\V1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken($request->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];

    }

    public function login(Request $request){

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:6',
        ]);

        $user = User::where('email', $validatedData['email'])->first();

        if(!$user || !Hash::check($validatedData['password'], $user->password)){
            return ['error' => 'The provided credentials are incorrect.'];
        }

        $token = $user->createToken($user->name);

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function logout(Request $request){

        $request->user()->tokens()->delete();

    }

}
