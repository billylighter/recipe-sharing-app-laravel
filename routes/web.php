<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/feed', [FeedController::class, 'index'])
    ->middleware(['auth'])
    ->name('feed');

Route::resource('recipes', RecipeController::class)
    ->only(['index', 'create', 'store', 'show', 'edit', 'update', 'destroy'])
    ->middleware(['auth']);

Route::get('/recipes/ingredients/{ingredient}', [IngredientController::class, 'show'])
    ->middleware(['auth'])
    ->name('ingredients');

Route::get('/recipes/categories/{category}', [CategoryController::class, 'show'])
    ->middleware(['auth'])
    ->name('categories');

Route::resource('comments', CommentController::class)
    ->only(['store', 'update', 'destroy'])
    ->middleware(['auth']);

require __DIR__.'/auth.php';
