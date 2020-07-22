<?php

namespace App\Domain\Qualitative\UseCase;

use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;

class FindCompanyHistoriesUseCase
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

    /**
     * １企業ごとの沿革を表示する
     *
     * @param string $stockCode
     *
     */
    public function execute(string $stockCode)
    {
        return $this->historyRepository->findCompanyHistories($stockCode);
    }
}
