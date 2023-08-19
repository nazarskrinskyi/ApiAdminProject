<?php

namespace App\Http\Controllers\Admin\Movie;


use App\Models\Category;
use App\Models\CategoryMovie;
use App\Models\Movie;
use Illuminate\View\View;

class EditController extends BaseController
{
    public function __invoke(Movie $movie): View
    {
        $category_movies = CategoryMovie::where('movie_id','=',$movie->id)->get();
        $categories = Category::all();
        return view('admin.movie.edit', compact('movie','categories', 'category_movies'));
    }
}
