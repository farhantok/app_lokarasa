<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Contracts\AnimeInterface::class, \App\Services\AnimeService::class);
        $this->app->bind(\App\Contracts\FilmInterface::class, \App\Services\FilmService::class);
        $this->app->bind(\App\Contracts\ReviewInterface::class, \App\Services\ReviewService::class);
        $this->app->bind(\App\Contracts\WatchlistInterface::class, \App\Services\WatchlistService::class);
        $this->app->bind(\App\Contracts\DetailInterface::class, \App\Services\DetailService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::enforceMorphMap([
            'movie' => \App\Models\Movie::class,
            'anime' => \App\Models\Anime::class,
        ]);
    }
}
