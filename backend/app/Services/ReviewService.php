<?php

namespace App\Services;

use App\Contracts\ReviewInterface;

class ReviewService implements ReviewInterface
{
    public function addReview(
        int $userId,
        int $itemId,
        string $review,
        int $rating
    ): bool {
        return true;
    }

    public function updateReview(
        int $reviewId,
        string $review,
        int $rating
    ): bool {
        return true;
    }

    public function deleteReview(
        int $reviewId
    ): bool {
        return true;
    }

    public function getReviews(
        int $itemId
    ): array {
        return [];
    }

    public function getAverageRating(
        int $itemId
    ): float {
        return 0;
    }
}