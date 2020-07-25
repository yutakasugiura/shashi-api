<?php

namespace App\Repository;

use App\Models\Company;
use App\Models\History;
use Illuminate\Support\Collection;

class CompanyRepository
{
    /** @var Company */
    private $eloquentCompany;

    /** @var History */
    private $eloquentHistory;

    public function __construct(
        Company $eloquentCompany,
        History $eloquentHistory
    ) {
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentHistory = $eloquentHistory;
    }

    public function createCompany(
        string $stockCode,
        string $companyName,
        string $status
    ): Company {
        return $this->eloquentCompany->updateOrCreate([
            'stock_code'   => $stockCode,
            'name' => $companyName,
            'status' => $status,
        ]);
    }

    public function findCompany(
        string $stockCode
    ): ?Company {
        return $this->eloquentCompany
            ->where('stock_code', $stockCode)
            ->first();
    }

    public function showCompanyLists(): Collection
    {
        return $this->eloquentCompany->get();
    }

    public function updateCompanyStatus(string $stockCode, string $status): void
    {
        $this->eloquentCompany
            ->where('stock_code', $stockCode)
            ->update(['status' => $status]);
    }
}
