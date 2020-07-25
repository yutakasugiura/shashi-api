<?php

namespace App\Repository;

use App\Models\Company;
use App\Models\History;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class HistoryRepository
{
    /** @var History */
    private History $eloquentHistory;
    private Company $eloquentCompany;

    public function __construct(
        History $eloquentHistory,
        Company $eloquentCompany
    ) {
        $this->eloquentHistory = $eloquentHistory;
        $this->eloquentCompany = $eloquentCompany;
    }

    /**
     * 沿革を永続化
     *
     * @param integer $companyId
     * @param integer $historyTagId
     * @param integer $regionId
     * @param Carbon $year
     * @param string $summary
     * @param string $detail
     * @return History
     */
    public function createHistory(
        int $companyId,
        int $historyTagId,
        int $regionId,
        Carbon $year,
        string $summary,
        string $detail
    ): History {
        return $this->eloquentHistory->updateOrCreate([
            'company_id' => $companyId,
            'history_tag_id'     => $historyTagId,
            'region_id'  => $regionId,
            'year'       => $year->toDateString(),
            'summary'    => $summary,
            'detail'     => $detail
        ]);
    }

    /**
     * 沿革を取得（企業名単位）
     *
     * @param string $stockCode
     * @return Collection
     */
    public function findCompanyHistory(string $stockCode): Collection
    {
        return  $this->eloquentHistory
                ->join('companies', 'histories.company_id', '=', 'companies.id')
                ->join('history_tags', 'histories.history_tag_id', '=', 'history_tags.id')
                ->join('regions', 'histories.region_id', '=', 'regions.id')
                ->select(
                    'histories.id',
                    'histories.company_id',
                    'companies.name as company_name',
                    'companies.stock_code',
                    'histories.year',
                    'histories.summary',
                    'histories.detail',
                    'history_tags.name as history_tag_name',
                    'regions.name'
                )
                ->where('stock_code', $stockCode)
                ->get();
    }

    /**
     * 沿革を削除
     *
     * @param int $companyId
     * @return integer
     */
    public function deleteHistory(int $companyId): int
    {
        return $this->eloquentHistory
            ->where('company_id', $companyId)
            ->delete();
    }
}
