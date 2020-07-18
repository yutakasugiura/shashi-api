<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('stock_code')
                ->comment('株式コード');
            $table->string('name')
                ->comment('会社名');
            $table->string('founder')
                ->comment('創業者');
            $table->string('found_year')
                ->comment('設立年');
            $table->string('industry')
                ->comment('産業区分');
            $table->string('origin')
                ->comment('原点');
            $table->string('img_url')
                ->comment('画像url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
