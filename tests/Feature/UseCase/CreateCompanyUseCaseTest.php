<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Region;
use App\Models\Company;
use App\Models\HistoryTag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Qualitative\UseCase\ImportCompanyUseCase;

class CreateCompanyUseCaseTest extends TestCase
{
    use RefreshDatabase;

    /** @var ImportCompanyUseCase */
    private $importCompanyUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->importCompanyUseCase = app()->make(
            ImportCompanyUseCase::class
        );
    }

    //vendor/bin/phpunit

    /**
     * Can Create Company?
     *
     * @return void
     */
    public function testCanCreateCompany()
    {
        //Create History Tag
        $historyTags = config('seeder.history_tag');
        foreach ($historyTags as $historyTag) {
            HistoryTag::create([
                'name'           => $historyTag['name'],
                'classification' => $historyTag['classification']
            ]);
        }

        //Create Region
        $regions = config('seeder.region');
        foreach ($regions as $region) {
            Region::create([
                'name' => $region['name'],
            ]);
        }

        //Create Company
        $companies = config('seeder.company');
        foreach ($companies as $company) {
            Company::create([
                'name' => $company['name'],
                'stock_code' => $company['stock_code'],
                'status' => $company['status'],
            ]);
        }

        //Create Company & Histories etc...
        $stockCode = '8011'; //NOTE: 三陽商会を生成
        $this->importCompanyUseCase->execute($stockCode);

        //Check The Companies Table
        $this->assertDatabaseHas('companies', [
            'stock_code' => '8011',
            'name'       => '三陽商会'
        ]);

        //Check The Histories Table
        $this->assertDatabaseHas('histories', [
            'year' => '1943-01-01',
            'summary' => '三陽商会を設立'
        ]);
    }
}
