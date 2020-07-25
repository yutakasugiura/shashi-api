<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

class ShowCompanyDetailUseCase
{
    /** @var ReadCompanyJsonUtility */
    private $readCompanyJsonUtility;

    /** @var CompanyRepository */
    private $companyRepository;

    /** @var HistoryRepository */
    private $historyRepository;

    public function __construct(
        ReadCompanyJsonUtility $readCompanyJsonUtility,
        CompanyRepository $companyRepository,
        HistoryRepository $historyRepository
    ) {
        $this->readCompanyJsonUtility = $readCompanyJsonUtility;
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
    }

    /**
     * 企業詳細を取得
     *
     * @return void
     */
    public function execute($stockCode)
    {
        return $this->historyRepository->findCompanyHistory($stockCode);
    }
}
