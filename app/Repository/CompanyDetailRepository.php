<?php

namespace App\Repository;

use App\Models\companyDetail;

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
}
