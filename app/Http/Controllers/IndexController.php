<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Domain\Qualitative\UseCase\ShowCompanyListUseCase;

class IndexController extends Controller
{
    private ShowCompanyListUseCase $showCompanyListUseCase;

    public function __construct(
        ShowCompanyListUseCase $showCompanyListUseCase
    ) {
        $this->showCompanyListUseCase = $showCompanyListUseCase;
    }

    public function index()
    {
        $companies = $this->showCompanyListUseCase->execute();

        return view('welcome', compact('companies'));
    }
}
