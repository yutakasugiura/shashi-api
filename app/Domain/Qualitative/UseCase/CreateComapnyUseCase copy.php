<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

class CreateCompanyUseCase
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
     * 1. Import json URL
     *
     * 2. Create Company
     *
     * 3. Create Histories etc...
     *
     * @param string $url
     * @return void
     */
    public function execute(
        string $url
    ) {
        //read json
        $company = $this->readCompanyJsonUtility->convertJsonToArray($url);

        //1. create company
        $stockCode = $company->get('stock_code');
        $companyName = $company->get('name');
        $companyId = $this->companyRepository->createCompany($stockCode, $companyName)->id;

        //2. create History

        $histories = $company->get('histories');

        if (isset($histories)) {
            foreach ($histories as $history) {
                $year = Carbon::parse($history['year']);

                $history = $this->historyRepository->createHistory(
                    $companyId,
                    $history['tag_id'],
                    $history['region_id'],
                    $year,
                    $history['summary'],
                    $history['detail']
                );
            }
        }

        //補足情報を永続化する
        //TODO: 後日実装


        //歴代経営陣を永続化する
        //TODO: 後日実装
    }
}
