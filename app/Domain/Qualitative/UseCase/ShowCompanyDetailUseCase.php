<?php

namespace App\Domain\Qualitative\UseCase;

use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;

class ShowCompanyDetailUseCase
{
    /** @var CompanyRepository */
    private $companyRepository;

    /** @var HistoryRepository */
    private $historyRepository;

    public function __construct(
        CompanyRepository $companyRepository,
        HistoryRepository $historyRepository
    ) {
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
    }

    public function execute($stockCode)
    {
        return $this->companyRepository->getHistories($stockCode);
    }
}
