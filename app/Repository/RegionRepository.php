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
}
