<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'category_id');
    }

    public function series() : HasMany
    {
        return $this->hasMany(Series::class, 'series_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
