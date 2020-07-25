<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Domain\Qualitative\UseCase\ShowCompanyListUseCase;
use App\Domain\Qualitative\UseCase\ShowCompanyDetailUseCase;

class CompanyController extends Controller
{
    /** @var ShowCompanyListUseCase */
    private $showCompanyListUseCase;

    /** @var ShowCompanyDetailUseCase */
    private $showCompanyDetailUseCase;

    public function __construct(
        ShowCompanyListUseCase $showCompanyListUseCase,
        ShowCompanyDetailUseCase $showCompanyDetailUseCase
    ) {
        $this->showCompanyListUseCase = $showCompanyListUseCase;
        $this->showCompanyDetailUseCase = $showCompanyDetailUseCase;
    }

    /**
     * 企業一覧を表示する（ステータスが「enable」のみ表示）
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->showCompanyListUseCase->execute();

        return response()->json($companies);
    }

    /**
    * 企業詳細を表示する（証券コード検索）
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function show($stockCode)
    {
        $company = $this->showCompanyDetailUseCase->execute($stockCode);

        return response()->json($company);
    }
}
