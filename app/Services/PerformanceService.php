<?php

namespace App\Services;

use App\Repository\PerformanceRepository;

class PerformanceService
{
    /** @var PerformanceRepository */
    private $performanceRepository;

    public function __construct(
        PerformanceRepository $performanceRepository
    ) {
        $this->performanceRepository = $performanceRepository;
    }

    public function createPerformance(array $years)
    {
        $this->performanceRepository->createPerformance($years);
    }

    public function createSales(array $sales)
    {
        $this->performanceRepository->createSale($sales);
    }
}
