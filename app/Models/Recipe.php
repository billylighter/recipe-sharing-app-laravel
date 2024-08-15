<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'instructions'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients() : BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients')->withPivot('quantity');
    }

    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'recipe_categories');
    }

    public function comments() : HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites() : HasMany
    {
        return $this->hasMany(Favorite::class);
    }

}
