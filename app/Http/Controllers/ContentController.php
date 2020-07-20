<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Qualitative\UseCase\showCompanyDetailUseCase;

class ContentController extends Controller
{
    private ShowCompanyDetailUseCase $showCompanyDetailUseCase;

    public function __construct(
        ShowCompanyDetailUseCase $showCompanyDetailUseCase
    ) {
        $this->showCompanyDetailUseCase = $showCompanyDetailUseCase;
    }

    public function index(Request $request, $stockCode)
    {
        $items = $this->showCompanyDetailUseCase->execute($stockCode)->toArray()[0];
        // dd($company);

        return view('company', compact('items'));
    }
}
