<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Industry extends Model
{
    protected $guarded = ['id'];

    /**
     * 企業詳細とのリレーション
     *
     * @return HasMany
     */
    public function companyDetails(): HasMany
    {
        return $this->hasMany(CompanyDetail::class);
    }
}
