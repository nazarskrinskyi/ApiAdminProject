<?php

namespace App\Http\Controllers\Api\Movie;


use App\Http\Controllers\Controller;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Movie;

class ShowController extends Controller
{
    public function __invoke(Movie $movie): MovieResource
    {
        $movie = Movie::findOrFail($movie->id);
        return new MovieResource($movie);
    }
}
