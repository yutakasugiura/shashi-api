<?php

namespace App\Repository;

use App\Models\Company;
use App\Models\History;
use Illuminate\Support\Collection;

class CompanyRepository
{
    /** @var Company */
    private $eloquentCompany;

    /** @var History */
    private $eloquentHistory;

    public function __construct(
        Company $eloquentCompany,
        History $eloquentHistory
    ) {
        $this->eloquentCompany = $eloquentCompany;
        $this->eloquentHistory = $eloquentHistory;
    }

    /**
     * 企業を生成する
     *
     * @param string $stockCode
     * @param string $companyName
     * @param string $status
     * @return Company
     */
    public function createCompany(
        string $stockCode,
        string $companyName,
        string $status
    ): Company {
        return $this->eloquentCompany->updateOrCreate([
            'stock_code'   => $stockCode,
            'name' => $companyName,
            'status' => $status,
        ]);
    }

    /**
     * 企業を取得する
     *
     * @param string $stockCode
     * @return Company|null
     */
    public function findCompany(
        string $stockCode
    ): ?Company {
        return $this->eloquentCompany
            ->where('stock_code', $stockCode)
            ->first();
    }

    /**
     * 証券コードを取得
     *
     * @param integer $companyId
     * @return Company|null
     */
    public function findStockCode(
        int $companyId
    ): ?Company {
        return $this->eloquentCompany
            ->where('id', $companyId)
            ->first();
    }

    /**
     * 企業一覧を取得（Enableのみ）
     *
     * @param string $status
     * @return Collection
     */
    public function showCompanyLists(string $status): Collection
    {
        return $this->eloquentCompany
            ->where('status', $status)
            ->with('companyDetail')
            ->get();
    }

    /**
     * 表示ステータスの更新
     *
     * @param string $stockCode
     * @param string $status
     * @return void
     */
    public function updateCompanyStatus(string $stockCode, string $status): void
    {
        $this->eloquentCompany
            ->where('stock_code', $stockCode)
            ->update(['status' => $status]);
    }
}
