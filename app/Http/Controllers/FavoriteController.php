<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function show() {
        $userFavorites = User::find(Auth::guard("sanctum")->user()->id)
            ->Favorites;

        return [
            "userFavorites" => $userFavorites,
        ];
    }

    public function store(Request $request) {

    }
}
