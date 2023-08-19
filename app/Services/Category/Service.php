<?php

namespace App\Services\Category;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Monolog\Handler\IFTTTHandler;

class Service
{
    public function update(array $data, Category $category): Category|string
    {
        try {
            DB::beginTransaction();
            $category->update($data); // Use the update method on the $category instance

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $category;

    }

    public function store(array $data): Category|string
    {
        try {
            DB::beginTransaction();
            $category = Category::create($data);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $category;
    }


}
