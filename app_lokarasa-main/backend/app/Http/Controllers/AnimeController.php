<?php

namespace App\Http\Controllers;

use App\Contracts\AnimeInterface;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    protected AnimeInterface $animeService;

    public function __construct(AnimeInterface $animeService)
    {
        $this->animeService = $animeService;
    }

    public function search(Request $request)
    {
        return response()->json(
            $this->animeService->searchByTitle(
                $request->title
            )
        );
    }

    public function genre($genre)
    {
        return response()->json(
            $this->animeService->searchByGenre($genre)
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->animeService->getDetail($id)
        );
    }
}