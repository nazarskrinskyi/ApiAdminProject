<?php

namespace App\Http\Controllers\Admin\Movie;


use App\Models\Category;
use Illuminate\View\View;
class CreateController extends BaseController
{
    public function __invoke(): View
    {
        $categories = Category::all();
        return view('admin.movie.create',compact('categories'));
    }
}
