<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;
use App\Domain\Qualitative\UseCase\CreateCompanyUseCase;
use App\Domain\Qualitative\UseCase\UpdateCompanyUseCase;

class CreateController extends Controller
{

    /** @var CreateCompanyUseCase */
    private $createCompanyUseCase;

    /** @var UpdateCompanyUseCase */
    private $updateCompanyUseCase;

    public function __construct(
        CreateCompanyUseCase $createCompanyUseCase,
        UpdateCompanyUseCase $updateCompanyUseCase
    ) {
        $this->createCompanyUseCase = $createCompanyUseCase;
        $this->updateCompanyUseCase = $updateCompanyUseCase;
    }

    /**
     * 企業を保存する
     *
     * @return void
     */
    public function store(Request $request)
    {
        $stockCode = $request->stockCode;

        $url = storage_path('json/qualitative/'.$stockCode.'.json');

        $companies = $this->createCompanyUseCase->execute($url);

        return view('success_store', compact('companies'));
    }

    /**
     * 企業を更新する
     *
     * @return void
     */
    public function update(Request $request)
    {
        $stockCode = $request->stockCode;

        $url = storage_path('json/qualitative/'.$stockCode.'.json');

        $companies = $this->updateCompanyUseCase->execute($url);

        return view('success_store', compact('companies'));
    }
}
