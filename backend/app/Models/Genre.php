<?php

namespace App\Models;

use Database\Factories\GenreFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'type'])]
class Genre extends Model
{
    /** @use HasFactory<GenreFactory> */
    use HasFactory;

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genres', 'genre_id', 'movie_id');
    }

    public function animes()
    {
        return $this->belongsToMany(Anime::class, 'anime_genres', 'genre_id', 'anime_id');
    }
}