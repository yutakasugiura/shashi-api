<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\CompanyService;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @var companyService */
    private $companyService;

    public function setUp(): void
    {
        parent::setUp();

        $this->companyService = app()->make(
            CompanyService::class
        );
    }

    public function testCanCreateCompany()
    {
        $company = [
            'stock_code' => 7203,
            'name'       => 'トヨタ自動車',
            'memo'       => '三河モンロー主義'
        ];

        $this->companyService->createCompany(
            $company['stock_code'],
            $company['name'],
            $company['memo']
        );

        $this->assertDatabaseHas('companies', [
            'stock_code' => 7203,
            'name'       => 'トヨタ自動車',
            'memo'       => '三河モンロー主義'
        ]);
    }
}
