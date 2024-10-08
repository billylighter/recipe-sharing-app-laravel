<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favorite;
use App\Models\Ingredient;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\RecipeIngredient;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'password'
         ]);

         Category::factory(10)->create();
         Ingredient::factory(10)->create();
         Recipe::factory(10)->create();
         Favorite::factory(10)->create();
         Comment::factory(20)->create();
         RecipeCategory::factory(10)->create();
         RecipeIngredient::factory(20)->create();
    }
}
