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


    // _____________________ Relations ____________________________
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



    // _____________________ Scopes ____________________________

    public function scopeSearch($query, $searchQuery) {

        if($searchQuery) {
            return $query->where('title', 'like', '%' . $searchQuery . '%')
                ->orWhere('description', 'like', '%' . $searchQuery . '%');
        }
    }

    public function scopeCategory($query, $categoryQuery) {

        if($categoryQuery) {
            $categoryId = Category::where("name", "like" ,"%$categoryQuery%")->first()->id;
            return $query->where('category_id', $categoryId);
        }
    }

    public function scopeYear($query, $yearQuery){

        if($yearQuery) {
            return $query->where('release_year', $yearQuery);
        }
    }


}
