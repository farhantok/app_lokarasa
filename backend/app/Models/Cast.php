<?php

namespace App\Models;

use Database\Factories\CastFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['movie_id', 'name', 'character_name', 'profile_path'])]
class Cast extends Model
{
    /** @use HasFactory<CastFactory> */
    use HasFactory;

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}