<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = __('My recipes');
        $taxonomy = '';
        $recipes = Recipe::with('categories', 'user')->where('user_id', Auth::id())->latest()->paginate(6);
        return view('dashboard.recipes.index', compact('recipes', 'title', 'taxonomy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
      $comments = Comment::with('user')->where('recipe_id', $recipe->id)->latest()->paginate(5);

        return view('dashboard.recipes.show', compact('recipe', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect(route('recipes.index'));
    }
}
