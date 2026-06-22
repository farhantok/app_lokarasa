<?php

namespace App\Http\Controllers;

use App\Contracts\ReviewInterface;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    protected ReviewInterface $reviewService;

    public function __construct(
        ReviewInterface $reviewService
    ) {
        $this->reviewService = $reviewService;
    }

    public function index($itemId)
    {
        return response()->json(
            $this->reviewService->getReviews($itemId)
        );
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => $this->reviewService->addReview(
                $request->user_id,
                $request->item_id,
                $request->review,
                $request->rating
            )
        ]);
    }

    public function update(Request $request, $reviewId)
    {
        return response()->json([
            'success' => $this->reviewService->updateReview(
                $reviewId,
                $request->review,
                $request->rating
            )
        ]);
    }

    public function destroy($reviewId)
    {
        return response()->json([
            'success' => $this->reviewService->deleteReview(
                $reviewId
            )
        ]);
    }

    public function average($itemId)
    {
        return response()->json([
            'average_rating' =>
                $this->reviewService
                     ->getAverageRating($itemId)
        ]);
    }
}