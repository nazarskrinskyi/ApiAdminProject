<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\View\View;

class IndexController extends Controller
{


    public function __invoke(): View
    {
        $movies = Movie::where('is_posted', '=', 1)->paginate(6);
        return view('main', compact('movies'));
    }


}
