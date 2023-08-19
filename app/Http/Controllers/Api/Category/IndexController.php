<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\FilterRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Contracts\Container\BindingResolutionException;

class IndexController extends Controller
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $genres = Category::paginate(10);
        return CategoryResource::collection($genres);
    }
}
