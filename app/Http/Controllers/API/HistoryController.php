<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Qualitative\UseCase\FindCompanyHistoriesUseCase;

class HistoryController extends Controller
{
    private FindCompanyHistoriesUseCase $findCompanyHistoriesUseCase;

    public function __construct(
        FindCompanyHistoriesUseCase $findCompanyHistoriesUseCase
    ) {
        $this->findCompanyHistoriesUseCase = $findCompanyHistoriesUseCase;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $stockCode)
    {
        $histories = $this->findCompanyHistoriesUseCase->execute($stockCode);

        return response()->json($histories);
    }

    // public function index(Request $request, $stockCode)
    // {
    //     $companyId = Company::where('stock_code', $stockCode)->first()->id;

    //     $histories = History::where('company_id', $companyId)->get();

    //     return response()->json($histories);
    // }
}
