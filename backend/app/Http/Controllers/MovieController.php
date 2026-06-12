<?php

namespace App\Http\Controllers;

use App\Contracts\FilmInterface;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected FilmInterface $filmService;

    public function __construct(FilmInterface $filmService)
    {
        $this->filmService = $filmService;
    }

    public function search(Request $request)
    {
        return response()->json(
            $this->filmService->searchByTitle(
                $request->title
            )
        );
    }

    public function genre($genreId)
    {
        return response()->json(
            $this->filmService->searchByGenre($genreId)
        );
    }

    public function show($id)
    {
        return response()->json(
            $this->filmService->getDetail($id)
        );
    }
}