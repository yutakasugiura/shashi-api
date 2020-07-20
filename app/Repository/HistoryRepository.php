<?php

namespace App\Repository;

use App\Models\History;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;

class HistoryRepository
{
    /** @var History */
    private History $eloquentHistory;

    public function __construct(
        History $eloquentHistory
    ) {
        $this->eloquentHistory = $eloquentHistory;
    }

    public function createHistory(
        int $companyId,
        int $tagId,
        int $regionId,
        Carbon $year,
        string $summary,
        string $detail
    ): History {
        return $this->eloquentHistory->updateOrCreate([
            'company_id' => $companyId,
            'tag_id'     => $tagId,
            'region_id'  => $regionId,
            'year'       => $year->toDateString(),
            'summary'    => $summary,
            'detail'     => $detail
        ]);
    }

    public function showHistoryDetails(int $companyId): Collection
    {
        return $this->eloquentHistory
            ->where('company_id', $companyId)
            ->get();
    }

    public function deleteHistory($companyId): int
    {
        return $this->eloquentHistory
            ->where('company_id', $companyId)
            ->delete();
    }
}
