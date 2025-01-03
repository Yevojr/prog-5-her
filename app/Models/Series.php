<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Series extends Model
{

    public function games() : BelongsToMany
    {
        return $this->belongsToMany(Game::class, 'game_id');
    }

}
