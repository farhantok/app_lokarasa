<?php

namespace App\Contracts;

interface WatchlistInterface
{
    public function addToWatchlist(
        int $userId,
        int $itemId,
        string $type
    ): bool;

    public function updateStatus(
        int $userId,
        int $itemId,
        string $status
    ): bool;

    public function removeFromWatchlist(
        int $userId,
        int $itemId
    ): bool;

    public function getWatchlist(
        int $userId
    ): array;
}