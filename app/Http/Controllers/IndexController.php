<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CompanyService;

class IndexController extends Controller
{
    /** @var CompanyService */
    private $companyService;

    public function __construct(
        CompanyService $companyService
    ) {
        $this->companyService = $companyService;
    }

    public function index()
    {
        $companies = $this->companyService->getCompany();

        return view('welcome', compact('companies'));
    }
}
