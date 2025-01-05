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

    public function series() : BelongsTo
    {
        return $this->belongsTo(Series::class, 'series_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
      'name', 'release_date', 'category_id', 'series_id', 'user_id', 'image'
    ];
}
