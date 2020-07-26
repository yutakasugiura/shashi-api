<?php

namespace App\Domain\Qualitative\UseCase;

use SplFileObject;
use Illuminate\Support\Carbon;
use App\Repository\CompanyRepository;
use App\Repository\HistoryRepository;
use App\Repository\PerformanceRepository;

class ImportPerformanceUseCase
{
    /** @var PerformanceRepository */
    private $performanceRepository;

    public function __construct(PerformanceRepository $performanceRepository)
    {
        $this->performanceRepository = $performanceRepository;
    }


    public function execute($stockCode)
    {
        //TODO: バリデーションを追加（3行のみ読み込み可など）

        $file = new SplFileObject(storage_path('s3/performance/'.$stockCode.'.csv'));
        $file->setFlags(SplFileObject::READ_CSV);

        //TODO: ログ用コピーファイルを追加

        foreach ($file as $row) {
            $performance[] = mb_convert_encoding($row, 'UTF-8', 'SJIS');
        }

        $performances = array(
            'year' => $performance[0],
            'sales' => $performance[1],
            'profit' => $performance[2]
        );
    }
}
