<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HistoryTag extends Model
{
    protected $guarded = ['id'];

    /**
     * 沿革とのリレーション
     *
     * @return HasMany
     */
    public function histories(): HasMany
    {
        return $this->hasMany(History::class);
    }
}
