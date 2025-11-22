<?php

namespace App\Http\Controllers\V1;

use App\Models\Favorite;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function show() {

        $userFavorites = User::find(Auth::guard("sanctum")->user()->id)->Favorites;

        return [
            "Your favorite movies" => $userFavorites->map(fn ($movie) => [
                "movie_id" => Movie::find($movie->movie_id)->id,
                "title" => Movie::find($movie->movie_id)->title,
            ]),
        ];
    }

    public function store(string $id) {

        $user = User::find(Auth::guard("sanctum")->id());
        $favoritedMovie = $user->Favorites->where("movie_id", $id)->first();
        $movieTitle = Movie::find($id)->title;

        if(!$favoritedMovie) {      // if movie isn't in favorite list

            $addedFavorite = Favorite::create([
                "user_id" => $user->id,
                "movie_id" => $id,
            ]);
            return [
                "message" => "Movie ADDED to your favorite list",
                "movie" => $movieTitle
            ];
        }

        else{
            $favoritedMovie->delete();

            return [
                "message" => "Movie REMOVED from your favorite list",
                "movie" => $movieTitle
            ];
        }

    }
}
