<?php

namespace App\Domain\Qualitative\UseCase;

use Illuminate\Support\Carbon;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Domain\Utility\ReadCompanyJsonUtility;

class ImportCompanyUseCase
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

        //沿革の削除（過去分がある場合）
        $this->historyRepository->deleteHistory($companyId);

        //沿革を永続化
        $histories = $company->get('histories');

        if (isset($histories)) {
            foreach ($histories as $history) {
                $year = Carbon::parse($history['year']);

                $history = $this->historyRepository->createHistory(
                    $companyId,
                    $history['history_tag_id'],
                    $history['region_id'],
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
