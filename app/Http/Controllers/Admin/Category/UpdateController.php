<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    public function __invoke(Category $category, UpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $category = $this->service->update($data, $category);
        return redirect()->route('admin.category.show', $category->id);
    }
}
