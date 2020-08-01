<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;
use App\Repository\CompanyRepository;

class CompanyService
{
    /** @var CompanyRepository */
    private $companyRepository;

    public function __construct(
        CompanyRepository $companyRepository
    ) {
        $this->companyRepository = $companyRepository;
    }

    public function createCompany(
        string $stockCode,
        string $name,
        string $memo
    ): Company {
        return $this->companyRepository->createCompany(
            $stockCode,
            $name,
            $memo
        );
    }

    public function getCompany(): Collection
    {
        return $this->companyRepository->getCompany();
    }
}
