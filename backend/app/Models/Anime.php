<?php

namespace App\Models;

use Database\Factories\AnimeFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['mal_id', 'title', 'synopsis', 'image_url', 'score', 'episodes', 'status', 'aired_from'])]
class Anime extends Model
{
    /** @use HasFactory<AnimeFactory> */
    use HasFactory;

    protected $table = 'animes';

    protected function casts(): array
    {
        return [
            'aired_from' => 'date',
            'score' => 'float',
            'episodes' => 'integer',
        ];
    }

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