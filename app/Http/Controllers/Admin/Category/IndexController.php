<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Filters\CategoryFilter;
use App\Http\Requests\Admin\Category\FilterRequest;
use App\Models\Category;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends Controller
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View|RedirectResponse
    {

        $data = $request->validated();

        $filter = app()->make(CategoryFilter::class, ['queryParams' => array_filter($data)]);
        $categories  = Category::filter($filter)->paginate(10);

        if (isset($_GET['page'])) {
            if ($_GET['page'] < 1 || $_GET['page'] > $categories->lastPage()) {
                return redirect(explode('?', $_SERVER['REQUEST_URI'])[0] . "?page=1");
            }
        }

        return view('admin.category.index', compact('categories'));
    }
}
