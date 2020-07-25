<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::where('status', 'enable')->get();
        return response()->json($companies);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function show(Request $request, $stockCode)
    {
        $company = Company::where('stock_code', $stockCode)->first();

        return response()->json($company);
    }
}
