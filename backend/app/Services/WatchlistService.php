<?php

namespace App\Services;

use App\Contracts\WatchlistInterface;

class WatchlistService implements WatchlistInterface
{
    public function addToWatchlist(
        int $userId,
        int $itemId,
        string $type
    ): bool {
        return true;
    }

    public function updateStatus(
        int $userId,
        int $itemId,
        string $status
    ): bool {
        return true;
    }

    public function removeFromWatchlist(
        int $userId,
        int $itemId
    ): bool {
        return true;
    }

    public function getWatchlist(
        int $userId
    ): array {
        return [];
    }
}