<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Repository\CompanyDetailRepository;
use App\Repository\LongPerformanceRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

class ShowCompanyDetailUseCase
{
    /** @var ReadCompanyJsonUtility */
    private $readCompanyJsonUtility;

    /** @var CompanyRepository */
    private $companyRepository;

    /** @var HistoryRepository */
    private $historyRepository;

    /** @var CompanyDetailRepository */
    private $companyDetailRepository;

    /** @var LongPerformanceRepository */
    private $longPerformanceRepository;

    public function __construct(
        ReadCompanyJsonUtility $readCompanyJsonUtility,
        CompanyRepository $companyRepository,
        HistoryRepository $historyRepository,
        CompanyDetailRepository $companyDetailRepository,
        LongPerformanceRepository $longPerformanceRepository
    ) {
        $this->readCompanyJsonUtility = $readCompanyJsonUtility;
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
        $this->companyDetailRepository = $companyDetailRepository;
        $this->longPerformanceRepository = $longPerformanceRepository;
    }

    /**
     * 企業詳細を取得
     *
     * @return void
     */
    public function execute($stockCode)
    {
        //企業を取得
        $company = $this->companyRepository->findCompany($stockCode)->toArray();

        //企業IDを取得
        $companyId = $company['id'];

        //企業詳細を取得
        $companyDetail = $this->companyDetailRepository->findCompanyDetail($companyId)->toArray();

        //沿革詳細を取得
        $histories = $this->historyRepository->findCompanyHistory($companyId)->toArray();

        //業績詳細を取得
        $performance = $this->longPerformanceRepository->findPerformance($companyId)->toArray();

        //X軸：年号はstringで保持
        $closingYear = explode(",", $performance['closing_year']);

        //Y軸：数値はintegerで保持
        $sales = array_map('intval', explode(",", $performance['sales']));
        $profit = array_map('intval', explode(",", $performance['profit']));

        $convertedPerformance = array(
            'closing_year' => $closingYear,
            'datasets' => array(
                'sales_label'  => $performance['sales_label'],
                'profit_label' => $performance['profit_label'],
                'sales'        => $sales,
                'profit'       => $profit,
            )
        );

        $convertedHistory = array('histories' => $histories);

        return array_merge($company, $companyDetail, $convertedHistory, $convertedPerformance);
    }
}
