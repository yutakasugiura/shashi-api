<?php

namespace App\Repository;

use App\Models\History;
use Illuminate\Support\Carbon;

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
        return $this->eloquentHistory->create([
            'company_id' => $companyId,
            'tag_id'     => $tagId,
            'region_id'  => $regionId,
            'year'       => $year->toDateString(),
            'summary'    => $summary,
            'detail'     => $detail
        ]);
    }
}