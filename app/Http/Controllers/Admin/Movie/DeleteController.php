<?php

namespace App\Http\Controllers\Admin\Movie;


use App\Models\Movie;
use Illuminate\Http\RedirectResponse;

class DeleteController extends BaseController
{
    public function __invoke(Movie $movie): RedirectResponse
    {
        $movie->delete();
        return redirect()->route('admin.movie.index');
    }
}
