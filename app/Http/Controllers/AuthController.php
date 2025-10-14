<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request){

        // TODO: return json for validation errors

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        // TODO: register users

        User::firstOrNew([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ])->save();

        return 'user created';

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
