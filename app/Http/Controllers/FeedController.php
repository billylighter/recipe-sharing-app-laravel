<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $title = __('Feed');
        $taxonomy = '';
        $recipes = Recipe::with('categories', 'ingredients', 'user')->latest()->paginate(6);
        return view('dashboard.recipes.index', compact('recipes', 'title', 'taxonomy'));
    }
}
