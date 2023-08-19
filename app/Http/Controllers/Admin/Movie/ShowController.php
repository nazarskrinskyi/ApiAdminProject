<?php

namespace App\Http\Controllers\Admin\Movie;


use App\Models\Movie;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Movie $movie): View
    {
        $categories = $movie->categories;
        return view('admin.movie.show', compact('movie', 'categories'));
    }
}
