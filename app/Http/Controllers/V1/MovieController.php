<?php

namespace App\Http\Controllers\V1;

use App\Http\Requests\V1\MovieRequest;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $path = $request->file('poster')->store('posters', "public");

        $movie = Movie::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'release_year' => $validatedData['release_year'],
            'duration' => $validatedData['duration'],
            'poster' => Storage::url($path),
            'trailer_url' => $validatedData['trailer_url'],
            'category_id' => $validatedData['category_id'],
        ]);

//        return dd($movie);

        return $movie->fresh()->toResource();
    }


    public function show(string $id)
    {
        return Movie::with("category")->findOrFail($id)->toResource();
    }


    public function update(MovieRequest $request, string $id)
    {
        $validated = $request->validated();

        $movie = Movie::findOrFail($id);

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

        Movie::findOrFail($id)->delete();

        return ["message" => "Movie deleted"];
    }
}
