<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{

    public function show($id) {

        $rates = Movie::findOrFail($id)
            ->ratings
            ->pluck('score');

        $sum= 0;

        foreach ($rates as $rate) {
            $sum = $sum + $rate;
        }

        return $sum/count($rates);              // returning movie average score
    }

    public function store(Request $request, string $id) {

        $validated = $request->validate([
            'score' => 'required|integer|between:0,10',
        ]);

        Rating::create([
            'movie_id' => $id,
            'user_id' => Auth::guard('sanctum')->user()->id,
            'score' => $request->score,
        ]);

        return [
            'Message' => "Score successfully stored.",
            "movie" => Movie::find($id)->title,
            "Given score" => $request->score,

        ];
    }
}
