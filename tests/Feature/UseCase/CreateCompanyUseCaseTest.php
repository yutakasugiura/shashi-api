<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Qualitative\UseCase\CreateTagUseCase;
use App\Domain\Qualitative\UseCase\CreateRegionUseCase;
use App\Domain\Qualitative\UseCase\CreateCompanyUseCase;

class CreateCompanyUseCaseTest extends TestCase
{
    use RefreshDatabase;

    /** @var CreateCompanyUseCase */
    private $createCompanyUseCase;

    /** @var CreateTagUseCase */
    private $createTagUseCase;

    public function setUp(): void
    {
        parent::setUp();

        $this->createTagUseCase = app()->make(
            CreateTagUseCase::class
        );

        $this->createRegionUseCase = app()->make(
            CreateRegionUseCase::class
        );

        $this->createCompanyUseCase = app()->make(
            CreateCompanyUseCase::class
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
        //Create Tag
        $tags = config('tag');
        foreach ($tags as $tag) {
            $this->createTagUseCase->execute(
                $tag['name'],
                $tag['status']
            );
        }

        //Create Region
        $regions = config('region');
        foreach ($regions as $region) {
            $this->createRegionUseCase->execute(
                $region['region'],
                $region['country'],
            );
        }

        //Read Company Databases in Json (ex.三陽商会 8011)
        $url = storage_path('json/qualitative/jp8011.json');

        //Create Company & Histories etc...
        $this->createCompanyUseCase->execute($url);

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
