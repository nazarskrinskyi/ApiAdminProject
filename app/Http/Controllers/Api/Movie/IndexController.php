<?php

namespace App\Http\Controllers\Api\Movie;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Movie\FilterRequest;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Movie;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $movies = Movie::paginate(10);
        return MovieResource::collection($movies);
    }
}
