<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\User;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        $movies = Movie::query()
            ->search($request->search)
            ->category($request->category)
            ->year($request->year)
            ->with('category')
            ->paginate(10);

        return $movies->toResourceCollection();
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


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:500',
            'release_year' => 'nullable',
            'duration' => 'nullable|integer',
            'trailer_url' => 'nullable|string|max:255',
        ]);

        $movie = Movie::find($id);

        $movie->update($validated);

        return [
            "message" => "Movie updated successfully",
            "data" => $movie->toResource(),
        ] ;
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
