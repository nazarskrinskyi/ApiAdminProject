<?php

namespace App\Http\Controllers\Admin\Movie;


use App\Http\Requests\Admin\Movie\StoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $movie = $this->service->store($data);
        return redirect()->route('admin.movie.index', $movie->id);
    }
}
