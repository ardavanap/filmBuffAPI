<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        // TODO: register users

    }

    public function login(Request $request){

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
