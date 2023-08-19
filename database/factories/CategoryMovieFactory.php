<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryMovie>
 */
class CategoryMovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random movie
        $movie = Movie::inRandomOrder()->first();

        // Get all available categories
        $category = Category::inRandomOrder()->first();

        return [
            'movie_id' => $movie->id,
            'category_id' => $category,
        ];
    }
}
