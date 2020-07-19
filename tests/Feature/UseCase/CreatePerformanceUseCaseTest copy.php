<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Domain\Qualitative\UseCase\CreateTagUseCase;
use App\Domain\Qualitative\UseCase\CreateRegionUseCase;
use App\Domain\Qualitative\UseCase\CreateCompanyUseCase;

class CreatePerformanceUseCaseTest extends TestCase
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
    public function testCanCreatePerformance()
    {
        //
    }
}
