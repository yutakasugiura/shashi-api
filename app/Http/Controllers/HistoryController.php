<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Qualitative\UseCase\FindCompanyHistoriesUseCase;

class HistoryController extends Controller
{
    private FindCompanyHistoriesUseCase $findCompanyHistoriesUseCase;

    public function __construct(
        FindCompanyHistoriesUseCase $findCompanyHistoriesUseCase
    ) {
        $this->findCompanyHistoriesUseCase = $findCompanyHistoriesUseCase;
    }

    public function show(Request $request, string $stockCode)
    {
        $items = $this->findCompanyHistoriesUseCase->execute($stockCode);

        return view('company', ['items' => $items]);
    }
}
