<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    protected $guarded = ['id'];

    public function histories(): HasMany
    {
        return $this->hasMany(History::class)
    }
}
