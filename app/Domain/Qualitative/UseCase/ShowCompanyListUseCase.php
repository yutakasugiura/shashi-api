<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Repository\CompanyDetailRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

class ShowCompanyListUseCase
{
    /** @var ReadCompanyJsonUtility */
    private $readCompanyJsonUtility;

    /** @var CompanyRepository */
    private $companyRepository;

    /** @var HistoryRepository */
    private $historyRepository;

    /** @var CompanyDetailRepository */
    private $companyDetailRepository;

    public function __construct(
        ReadCompanyJsonUtility $readCompanyJsonUtility,
        CompanyRepository $companyRepository,
        CompanyDetailRepository $companyDetailRepository,
        HistoryRepository $historyRepository
    ) {
        $this->readCompanyJsonUtility = $readCompanyJsonUtility;
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
        $this->companyDetailRepository = $companyDetailRepository;
    }

    /**
     * 企業一覧を取得（Enableのみ）
     *
     * @return Collection
     */
    public function execute(): array
    {
        //有効な企業を詳細とともに取得
        $status = config('company_status.enable');
        $companies =  $this->companyRepository->showCompanyLists($status)->toArray();

        foreach ($companies as $company) {
            $companyId = $company['id'];

            $details[] = $this->companyDetailRepository->findCompanyDetailAndBasicInfo($companyId)->toArray();
        }

        return $details;
    }
}
