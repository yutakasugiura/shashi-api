<?php

namespace App\Repository;

use App\Models\Region;

class RegionRepository
{
    private Region $eloquentRegion;

    public function __construct(
        Region $eloquentRegion
    ) {
        $this->eloquentRegion = $eloquentRegion;
    }

    public function updateOrCreateRegion(
        string $region,
        string $country
    ): Region {
        return $this->eloquentRegion->updateOrCreate([
            'region'  => $region,
            'country' => $country
        ]);
    }

    /**
     * 地域名idを取得
     *
     * @param string $region
     * @return int
     */
    public function findRegion(string $region): int
    {
        $tag =  $this->eloquentRegion
            ->where('name', $region)
            ->first();
        if (empty($tag)) {
            return 1; //エラー対処「id=1」を投げる
        } else {
            return $tag->id;
        }
    }
}
