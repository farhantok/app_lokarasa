<?php

namespace App\Http\Controllers;

use App\Contracts\WatchlistInterface;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    protected WatchlistInterface $watchlistService;

    public function __construct(
        WatchlistInterface $watchlistService
    ) {
        $this->watchlistService = $watchlistService;
    }

    public function index($userId)
    {
        return response()->json(
            $this->watchlistService->getWatchlist($userId)
        );
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => $this->watchlistService->addToWatchlist(
                $request->user_id,
                $request->item_id,
                $request->type
            )
        ]);
    }

    public function updateStatus(Request $request)
    {
        return response()->json([
            'success' => $this->watchlistService->updateStatus(
                $request->user_id,
                $request->item_id,
                $request->status
            )
        ]);
    }

    public function destroy(Request $request)
    {
        return response()->json([
            'success' => $this->watchlistService->removeFromWatchlist(
                $request->user_id,
                $request->item_id
            )
        ]);
    }
}