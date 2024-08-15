<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecipeCategory>
 */
class RecipeCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'recipe_id' => Recipe::all()->random()->id,
            'category_id' => Category::all()->random()->id
        ];
    }
}
