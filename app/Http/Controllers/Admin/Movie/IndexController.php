<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Filters\MovieFilter;
use App\Http\Requests\Admin\Movie\FilterRequest;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class IndexController extends BaseController
{

    /**
     * @throws BindingResolutionException
     */
    public function __invoke(FilterRequest $request): View|RedirectResponse
    {
        $data = $request->validated();
        $filter = app()->make(MovieFilter::class, ['queryParams' => array_filter($data)]);
        $movies  = Movie::filter($filter)->paginate(10);

        if (isset($_GET['page'])) {
            if ($_GET['page'] < 1 || $_GET['page'] > $movies->lastPage()) {
                return redirect(explode('?', $_SERVER['REQUEST_URI'])[0] . "?page=1");
            }
        }

        return view('admin.movie.index', compact('movies'));
    }
}
