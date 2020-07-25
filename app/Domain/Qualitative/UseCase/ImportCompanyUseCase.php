<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\RegionRepository;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Repository\IndustryRepository;
use App\Repository\HistoryTagRepository;
use App\Repository\CompanyDetailRepository;
use App\Repository\LongPerformanceRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;
use App\Models\LongPerformance;

class ImportCompanyUseCase
{
    /** @var ReadCompanyJsonUtility */
    private $readCompanyJsonUtility;

    /** @var CompanyRepository */
    private $companyRepository;

    /** @var HistoryRepository */
    private $historyRepository;

    /** @var HistoryTagRepository */
    private $historyTagRepository;

    /** @var RegionRepository */
    private $regionRepository;

    /** @var IndustryRepository */
    private $industryRepository;

    /** @var CompanyDetailRepository */
    private $companyDetailRepository;

    /** @var LongPerformanceRepository */
    private $longPerformanceRepository;

    public function __construct(
        ReadCompanyJsonUtility $readCompanyJsonUtility,
        CompanyRepository $companyRepository,
        HistoryRepository $historyRepository,
        HistoryTagRepository $historyTagRepository,
        RegionRepository $regionRepository,
        IndustryRepository $industryRepository,
        CompanyDetailRepository $companyDetailRepository,
        LongPerformanceRepository $longPerformanceRepository
    ) {
        $this->readCompanyJsonUtility = $readCompanyJsonUtility;
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
        $this->historyTagRepository = $historyTagRepository;
        $this->regionRepository = $regionRepository;
        $this->industryRepository = $industryRepository;
        $this->companyDetailRepository = $companyDetailRepository;
        $this->longPerformanceRepository = $longPerformanceRepository;
    }

    /**
     * Undocumented function
     *
     * @param string $stockCode
     * @return void
     */
    public function execute(
        string $stockCode
    ) {
        //Jsonを読み込む
        $url = storage_path('json/qualitative/'.$stockCode.'.json');
        $company = $this->readCompanyJsonUtility->convertJsonToArray($url);

        //企業の表示ステータスを有効化
        $status = config('company_status.enable');
        $this->companyRepository->updateCompanyStatus($stockCode, $status);

        //企業idを取得
        $companyId = $this->companyRepository->findCompany($stockCode)->id;

        //産業タグの取得
        $industryId = $this->industryRepository->findIndustry($company->get('industry'));

        //企業詳細の保存
        $this->companyDetailRepository->createCompanyDetail(
            $companyId,
            $industryId,
            $company->get('summary'),
            $company->get('detail'),
            $company->get('founder'),
            $company->get('found_year'),
            $company->get('found_type'),
            $company->get('found_region'),
            $company->get('ipo_year'),
            $company->get('ipo_type'),
            $company->get('top_img_path'),
            $company->get('person_img_path'),
            $company->get('person_img_path')
        );

        //沿革の削除（重複保存を避ける）
        $this->historyRepository->deleteHistory($companyId);

        //沿革を永続化
        $histories = $company->get('histories');
        if (isset($histories)) {
            foreach ($histories as $history) {
                //沿革タグの取得
                $historyTagId = $this->historyTagRepository->findHistoryTag($history['history_tag']);

                //地域タグの取得
                $regionId = $this->regionRepository->findRegion($history['region']);

                //年号の取得
                $year = $history['year'];

                $history = $this->historyRepository->createHistory(
                    $companyId,
                    $historyTagId,
                    $regionId,
                    $year,
                    $history['summary'],
                    $history['detail']
                );
            }
        }

        //業績を永続化
        $longPerformances = $company->get('long_performances');

        foreach ($longPerformances as $performance) {
            //決算年を文字列に変換
            $performanceArray = $performance['closing_year'];
            $closingYear = implode(",", $performanceArray);

            //業績数値を文字列に変換
            $dataArray = $performance['data'];
            $data = implode(",", $dataArray);

            $this->longPerformanceRepository->updateOrCreateLongPerformance(
                $companyId,
                $performance['label'],
                $closingYear,
                $data,
                $performance['background_color'],
            );
        }
    }
}
