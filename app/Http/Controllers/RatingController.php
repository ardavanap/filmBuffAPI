<?php

namespace App\Http\Controllers;

use App\Models\Movie;
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
        return $sum/count($rates);
    }

    public function store(Request $request) {

    }
}
