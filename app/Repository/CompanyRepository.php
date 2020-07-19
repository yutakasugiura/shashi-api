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

    /**
     * Undocumented function
     *
     * @param string $stockCode
     * @param string $companyName
     * @return Company
     */
    public function createCompany(
        string $stockCode,
        string $companyName
    ): Company {
        return $this->eloquentCompany->updateOrCreate([
            'stock_code'   => $stockCode,
            'name' => $companyName
        ]);
    }

    public function getCompany(): Collection
    {
        return $this->eloquentCompany->get();
    }
}
