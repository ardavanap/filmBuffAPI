<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function show(string $id){
        return Movie::findOrFail($id)->comments;
    }

    public function store(string $id ,Request $request){
        // TODO: add validation
        $validated = $request->validate([
            'content' => 'required|max:255|min:2',
        ]);

        $comment = Comment::create([
            'user_id'   =>  $request->user()->id,
            'content' => $validated['content'],
            'movie_id'  =>  $id
        ]);
    }
}
