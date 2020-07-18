<?php

namespace App\Repository;

use App\Models\Sale;
use App\Models\Performance;

class PerformanceRepository
{
    /** @var Performance */
    private $performance;

    /** @var Sale */
    private $sale;

    public function __construct(
        Performance $performance,
        Sale $sale
    ) {
        $this->performance = $performance;
        $this->sale = $sale;
    }

    public function createPerformance(array $years): Performance
    {
        return $this->performance->create($years);
    }

    public function createSale(array $sales): Sale
    {
        return  $this->sale->create($sales);
    }
}
