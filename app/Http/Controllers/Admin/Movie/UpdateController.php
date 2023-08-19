<?php

namespace App\Http\Controllers\Admin\Movie;

use App\Http\Requests\Admin\Movie\UpdateRequest;
use App\Models\Movie;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(Movie $movie, UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $movie = $this->service->update($data, $movie);
        return redirect()->route('admin.movie.show', $movie->id);
    }
}
