<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Region;
use App\Models\Company;
use App\Models\Industry;
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

        //Create Industry
        $industries = config('seeder.industry');
        foreach ($industries as $industry) {
            Industry::create([
                'name'           => $industry['name'],
                'classification' => $industry['classification']
            ]);
        }

        //Create Company
        $companies = config('seeder.company');
        foreach ($companies as $company) {
            Company::create([
                'name' => $company['name'],
                'stock_code' => $company['stock_code'],
                'status'     => $company['status'],
            ]);
        }

        //Create Company & Histories etc...
        $stockCode = '6758'; //NOTE: ソニーを生成
        $this->importCompanyUseCase->execute($stockCode);

        //Check The Companies Table
        $this->assertDatabaseHas('companies', [
            'stock_code' => '6758',
            'name'       => 'ソニー'
        ]);

        //Check The Histories Table
        $this->assertDatabaseHas('histories', [
            'summary' => '社名を「ソニー」に変更'
        ]);
    }
}
