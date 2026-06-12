<?php

namespace App\Contracts;

interface ReviewInterface
{
    public function addReview(
        int $userId,
        int $itemId,
        string $review,
        int $rating
    ): bool;

    public function updateReview(
        int $reviewId,
        string $review,
        int $rating
    ): bool;

    public function deleteReview(
        int $reviewId
    ): bool;

    public function getReviews(
        int $itemId
    ): array;

    public function getAverageRating(
        int $itemId
    ): float;
}