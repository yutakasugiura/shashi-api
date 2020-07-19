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

    /**
     * Update or Create Tag
     *
     * @param string $region
     * @param string $country
     * @return void
     */
    public function execute(string $region, string $country)
    {
        $this->regionRepository->updateOrCreateRegion(
            $region,
            $country
        );
    }
}
