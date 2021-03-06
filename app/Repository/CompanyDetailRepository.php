<?php

namespace App\Repository;

use App\Models\CompanyDetail;

class companyDetailRepository
{
    private companyDetail $eloquentCompanyDetail;

    public function __construct(
        companyDetail $eloquentCompanyDetail
    ) {
        $this->eloquentCompanyDetail = $eloquentCompanyDetail;
    }


    public function createCompanyDetail(
        int $companyId,
        int $industryId,
        string $summary,
        string $detail,
        string $founder,
        string $found_year,
        string $found_type,
        string $found_region,
        string $ipo_year,
        string $ipo_type,
        string $top_img_path,
        string $person_img_path
    ): CompanyDetail {
        return $this->eloquentCompanyDetail->updateOrCreate([
            'company_id'      => $companyId,
            'industry_id'     => $industryId,
            'summary'         => $summary,
            'detail'          => $detail,
            'founder'         => $founder,
            'found_year'      => $found_year,
            'found_type'      => $found_type,
            'found_region'    => $found_region,
            'ipo_year'        => $ipo_year,
            'ipo_type'        => $ipo_type,
            'top_img_path'    => $top_img_path,
            'person_img_path' => $person_img_path
        ]);
    }

    public function findCompanyDetail(int $companyId)
    {
        return $this->eloquentCompanyDetail
            ->where('company_id', $companyId)
            ->first();
    }

    public function findCompanyDetailAndBasicInfo(int $companyId)
    {
        return $this->eloquentCompanyDetail
            ->join('companies', 'company_details.company_id', '=', 'companies.id')
            ->join('industries', 'company_details.industry_id', '=', 'industries.id')
            ->select(
                'companies.name',
                'companies.stock_code',
                'company_details.person_img_path',
                'company_details.top_img_path',
                'industries.name as industry_name',
                'industries.classification as industry_classification',
            )
            ->where('company_id', $companyId)
            ->first();
    }

    public function delete(int $companyId)
    {
        return $this->eloquentCompanyDetail
            ->where('company_id', $companyId)
            ->delete();
    }
}
