<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompanyDetail extends Model
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
     * 産業種別とのリレーション
     *
     * @return BelongsTo
     */
    public function industry(): BelongsTo
    {
        return $this->belongsTo(Industry::class);
    }
}
