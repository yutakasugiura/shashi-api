<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Qualitative\UseCase\FindCompanyHistoriesUseCase;

class DetailController extends Controller
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
    public function show($stockCode)
    {
        $histories = $this->findCompanyHistoriesUseCase->execute($stockCode);

        return response()->json($histories);
    }
}
