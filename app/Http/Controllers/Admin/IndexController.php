<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\View\View;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        $categories = Category::all()->count();
        $movies = Movie::all()->count();
        return view('admin.index', compact('movies','categories'));
    }


}
