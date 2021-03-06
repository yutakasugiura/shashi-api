<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class History extends Model
{
    protected $guarded = ['id'];

    /**
     * 企業とのリレーション
     *
     * @return BelongsTo
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * 沿革種別とのリレーション
     *
     * @return BelongsTo
     */
    public function historyTag(): BelongsTo
    {
        return $this->belongsTo(HistoryTag::class);
    }

    /**
     * 地域とのリレーション
     *
     * @return BelongsTo
     */
    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }
}
