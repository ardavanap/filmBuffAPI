<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
        'description',
        'release_year',
        'duration',
        'poster',
        'trailer_url',
        'category_id',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function ratings() {
        return $this->hasMany(Rating::class, 'movie_id');
    }

    public function favorites() {
        return $this->hasMany(Favorite::class);
    }

}
