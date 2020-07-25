<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')
                ->comment('企業id');
            $table->unsignedBigInteger('industry_id')
                ->comment('産業種別id');
            $table->string('summary')
                ->comment('要旨');
            $table->string('detail')
                ->comment('本文');
            $table->string('founder')
                ->comment('創業者');
            $table->date('found_year')
                ->comment('創業年');
            $table->string('found_region')
                ->comment('創業地');
            $table->string('ipo_year')
                ->comment('上場年');
            $table->string('ipo_type')
                ->comment('上場区分');
            $table->string('top_img_path')
                ->comment('サムネ画像へのパス');
            $table->string('person_img_path')
                ->comment('人物画像へのパス');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('industry_id')
                ->references('id')
                ->on('industries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_details');
    }
}
