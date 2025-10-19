<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Sanctum\PersonalAccessToken;
use Laravel\Sanctum\Http\Middleware;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        // TODO: register users

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        $token = $user->createToken('user');

        return [
            'user' => $user,
            'token' => $token->plainTextToken
        ];

    }

    public function login(Request $request){

        // TODO: return json for validation errors

        $validatedData = $request->validate([
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        // TODO: Login user



    }

    public function logout(Request $request){

//        $request->user()->token()->delete();
        // TODO: test to see if token is deleted.

    }

}
