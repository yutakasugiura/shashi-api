<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Domain\Qualitative\UseCase\ImportPerformanceUseCase;

class CsvController extends Controller
{
    /** @var ImportPerformanceUseCase */
    private $importPerformanceUseCase;

    public function __construct(
        ImportPerformanceUseCase $importPerformanceUseCase
    ) {
        $this->importPerformanceUseCase = $importPerformanceUseCase;
    }

    /**
     * 企業情報を一括で保存する
     *
     * @return void
     */
    public function store(Request $request)
    {
        $stockCode = $request->stockCode;

        $this->importPerformanceUseCase->execute($stockCode);
    }
}
