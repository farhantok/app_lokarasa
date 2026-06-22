<?php

namespace App\Http\Controllers;

use App\Contracts\DetailInterface;

class DetailController extends Controller
{
    protected DetailInterface $detailService;

    public function __construct(
        DetailInterface $detailService
    ) {
        $this->detailService = $detailService;
    }

    public function movie($id)
    {
        return response()->json(
            $this->detailService->getMovieDetail($id)
        );
    }

    public function anime($id)
    {
        return response()->json(
            $this->detailService->getAnimeDetail($id)
        );
    }
}