<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecipeCategory extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'category_id'];

    /**
     * Get the recipe associated with this relationship.
     */
    public function recipe(): BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    /**
     * Get the category associated with this relationship.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
