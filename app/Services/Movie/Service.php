<?php

namespace App\Services\Movie;

use App\Models\CategoryMovie;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class Service
{
    public function update(array $data, Movie $movie): Movie|string
    {
        try {
            DB::beginTransaction();

            $data['is_posted'] = $data['is_posted'] ?? 0;
            $categories = $data['category'];
            unset($data['category']);
            $movie->update($data);
            $movie->categories()->sync($categories);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $movie;

    }

    public function store(array $data): Movie|string
    {
        try {
            DB::beginTransaction();

            $data['is_posted'] = $data['is_posted'] ?? 0;
            $categories = $data['category'];
            unset($data['category']);
            $movie = Movie::create($data);
            $movie->categories()->attach($categories);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $movie;
    }




}
