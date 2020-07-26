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
     * @param string $closingYear
     * @param string $sales
     * @param string $profit
     * @param string $salesLabel
     * @param string $profitLabel
     * @return LongPerformance
     */
    public function updateOrCreateLongPerformance(
        int $companyId,
        string $closingYear,
        string $sales,
        string $profit,
        string $salesLabel,
        string $profitLabel
    ): LongPerformance {
        return $this->eloquentLongPerformance->updateOrCreate([
            'company_id'   => $companyId,
            'closing_year' => $closingYear,
            'sales'        => $sales,
            'profit'       => $profit,
            'sales_label'  => $salesLabel,
            'profit_label' => $profitLabel
        ]);
    }

    /**
     * １社の業績を取得
     *
     * @param integer $companyId
     * @return LongPerformance|null
     */
    public function findPerformance(int $companyId): ?LongPerformance
    {
        return $this->eloquentLongPerformance
            ->where('company_id', $companyId)
            ->first();
    }

    public function deletePerformance(int $companyId)
    {
        $this->eloquentLongPerformance
            ->where('company_id', $companyId)
            ->delete();
    }
}
