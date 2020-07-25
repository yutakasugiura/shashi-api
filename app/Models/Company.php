<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
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

    /**
     * 通期業績とのリレーション（Phase1暫定）
     *
     * @return HasMany
     */
    public function performances(): HasMany
    {
        return $this->hasMany(Performance::class);
    }

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
