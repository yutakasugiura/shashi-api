<?php

namespace App\Domain\Qualitative\UseCase;

use App\Repository\RegionRepository;

class CreateRegionUseCase
{
    private RegionRepository $regionRepository;

    public function __construct(RegionRepository $regionRepository)
    {
        $this->regionRepository = $regionRepository;
    }

    public function execute()
    {
        $regions = config('region');
        foreach ($regions as $region) {
            $a = $this->regionRepository->updateOrCreateRegion(
                $region['region'],
                $region['country']
            );
        }
    }
}
