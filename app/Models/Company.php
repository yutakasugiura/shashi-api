<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    protected $guarded = ['id'];

    /**
     * 企業詳細とのリレーション
     *
     * @return HasOne
     */
    public function companyDetail(): HasOne
    {
        return $this->hasOne(CompanyDetail::class);
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

    /**
     * 業績とのリレーション
     *
     * @return HasMany
     */
    public function longPerformances(): HasMany
    {
        return $this->hasMany(LongPerformance::class);
    }
}
