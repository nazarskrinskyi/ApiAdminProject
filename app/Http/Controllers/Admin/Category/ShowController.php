<?php

namespace App\Http\Controllers\Admin\Category;

use App\Models\Category;
use Illuminate\View\View;

class ShowController extends BaseController
{
    public function __invoke(Category $category): View
    {
        return view('admin.category.show', compact('category'));
    }
}
