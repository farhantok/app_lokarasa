<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    protected $table = 'animes';

    protected $fillable = [
        'mal_id',
        'title',
        'synopsis',
        'image_url',
        'score',
        'episodes',
        'status',
        'aired_from',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'anime_genres', 'anime_id', 'genre_id');
    }

    public function watchlists()
    {
        return $this->morphMany(Watchlist::class, 'item');
    }

    public function reviews()
    {
        return $this->morphMany(Review::class, 'item');
    }
}