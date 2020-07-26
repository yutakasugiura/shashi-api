<?php

namespace App\Repository;

use App\Models\Industry;

class IndustryRepository
{
    private Industry $eloquentIndustry;

    public function __construct(
        industry $eloquentIndustry
    ) {
        $this->eloquentIndustry = $eloquentIndustry;
    }

    /**
     * 産業idを取得
     *
     * @param string $industry
     * @return int
     */
    public function findIndustry(string $industry): int
    {
        $tag =  $this->eloquentIndustry
            ->where('name', $industry)
            ->first();
        if (empty($tag)) {
            return 1; //エラー対処「id=1」を投げる
        } else {
            return $tag->id;
        }
    }
}
