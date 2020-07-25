<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\RegionRepository;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Repository\HistoryTagRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

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

    public function __construct(
        ReadCompanyJsonUtility $readCompanyJsonUtility,
        CompanyRepository $companyRepository,
        HistoryRepository $historyRepository,
        HistoryTagRepository $historyTagRepository,
        RegionRepository $regionRepository
    ) {
        $this->readCompanyJsonUtility = $readCompanyJsonUtility;
        $this->companyRepository = $companyRepository;
        $this->historyRepository = $historyRepository;
        $this->historyTagRepository = $historyTagRepository;
        $this->regionRepository = $regionRepository;
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

        //企業の外部キーを取得
        $companyId = $this->companyRepository->findCompany($stockCode)->id;

        //産業タグの取得

        //沿革の削除（過去分がある場合）
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
        //TODO: 後日実装
    }
}
