<?php

namespace App\Http\Controllers\API;

use App\Models\Company;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $stockCode)
    {

        // use join
        // $histories = DB::table('companies')->join('histories', 'companies.id', '=', 'histories.company_id')->get();

        // use with
        $histories = Company::with('histories')->where('stock_code', $stockCode)->first();

        return response()->json($histories);
    }

    // public function index(Request $request, $stockCode)
    // {
    //     $companyId = Company::where('stock_code', $stockCode)->first()->id;

    //     $histories = History::where('company_id', $companyId)->get();

    //     return response()->json($histories);
    // }
}
