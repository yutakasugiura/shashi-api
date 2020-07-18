<?php

namespace App\Repository;

use App\Models\Company;
use Illuminate\Support\Collection;

class CompanyRepository
{
    /** @var Company */
    private $eloquentCompany;

    public function __construct(
        Company $eloquentCompany
    ) {
        $this->eloquentCompany = $eloquentCompany;
    }

    public function createCompany(
        int $stockCode,
        string $name,
        string $memo
    ): Company {
        return $this->eloquentCompany->create([
            'stock_code' => $stockCode,
            'name'       => $name,
            'memo'       => $memo,
        ]);
    }

    public function getCompany(): Collection
    {
        return $this->eloquentCompany->get();
    }
}
