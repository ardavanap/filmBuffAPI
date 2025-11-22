<?php

namespace App\Http\Controllers\V1;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(string $id){
        return Movie::findOrFail($id)->comments->map->only(['content']);
    }

    public function store(string $id ,Request $request){

        $validated = $request->validate([
            'content' => 'required|max:255|min:2',
        ]);

        $comment = Comment::create([
            'user_id'   =>  $request->user()->id,
            'content' => $validated['content'],
            'movie_id'  =>  $id
        ]);

        return [
            "message" => "Comment added",
            "comment" => $comment
        ];
    }
}
