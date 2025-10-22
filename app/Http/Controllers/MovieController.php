<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

class MovieController extends Controller
{

    public function index()
    {
//        $movies = Movie::all();

//        return ['movies' => $movies];
        return Movie::paginate(15)->toResourceCollection();
    }


    public function store(MovieRequest $request)
    {
        $validatedData = $request->validated();

        $movie = Movie::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'release_year' => $validatedData['release_year'],
            'duration' => $validatedData['duration'],
//            'poster' => $validatedData['poster'],
            'trailer_url' => $validatedData['trailer_url'],
            'category_id' => $validatedData['category_id'],
        ]);

        return Movie::find($movie->id)->toResource();
    }


    public function show(string $id)
    {
        return Movie::findOrFail($id)->toResource();
    }


    public function update(MovieRequest $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {

        if(!User::isAdmin()){
            return ["message" => "Unauthorized"];
        }
        Movie::destroy($id);

        return ["message" => "Movie deleted"];
    }
}
