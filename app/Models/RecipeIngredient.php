<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeIngredient extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'ingredient_id', 'quantity'];

    /**
     * Get the recipe associated with this pivot entry.
     */
    public function recipe() : BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Get the ingredient associated with this pivot entry.
     */
    public function ingredient() : BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
