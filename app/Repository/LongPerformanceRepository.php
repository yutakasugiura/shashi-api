<?php

namespace App\Repository;

use App\Models\LongPerformance;

class LongPerformanceRepository
{
    private LongPerformance $eloquentLongPerformance;

    public function __construct(
        LongPerformance $eloquentLongPerformance
    ) {
        $this->eloquentLongPerformance = $eloquentLongPerformance;
    }

    /**
     * 業績を永続化する
     *
     * @param integer $companyId
     * @param string $label
     * @param string $closingYear
     * @param string $data
     * @param string $backgroundColor
     * @return LongPerformance
     */
    public function updateOrCreateLongPerformance(
        int $companyId,
        string $label,
        string $closingYear,
        string $data,
        string $backgroundColor
    ): LongPerformance {
        return $this->eloquentLongPerformance->updateOrCreate([
            'company_id'       => $companyId,
            'label'            => $label,
            'closing_year'     => $closingYear,
            'data'             => $data,
            'background_color' => $backgroundColor
        ]);
    }
}
