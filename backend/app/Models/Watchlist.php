<?php

namespace App\Models;

use Database\Factories\WatchlistFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['user_id', 'item_id', 'item_type', 'status'])]
class Watchlist extends Model
{
    /** @use HasFactory<WatchlistFactory> */
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->morphTo();
    }
}