<?php

namespace App\Http\Controllers\Api\Category;



use App\Http\Controllers\Controller;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;

class ShowController extends Controller
{
    public function __invoke(Category $category): CategoryResource
    {
        $genre = Category::findOrFail($category->id);
        return new CategoryResource($genre);
    }
}
