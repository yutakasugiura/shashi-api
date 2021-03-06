<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use App\Domain\Qualitative\UseCase\ImportCompanyUseCase;

class ImportController extends Controller
{
    /** @var ImportCompanyUseCase */
    private $importCompanyUseCase;

    public function __construct(
        ImportCompanyUseCase $importCompanyUseCase
    ) {
        $this->importCompanyUseCase = $importCompanyUseCase;
    }

    /**
     * 企業を表示する
     *
     * @return void
     */
    public function index(Request $request)
    {
        $test =  History::all();

        return view('welcome');
    }

    /**
     * 企業情報を一括で保存する
     *
     * @return void
     */
    public function store(Request $request)
    {
        $stockCode = $request->stockCode;

        //json_key照合
        $jsonKey = $request->jsonKey;
        $jsonSecretKey = config('json_key.json_key');

        if ($jsonKey == $jsonSecretKey) {
            $this->importCompanyUseCase->execute($stockCode);

            return view('success_store');
        } else {
            return view('failed_store');
        }
    }
}
