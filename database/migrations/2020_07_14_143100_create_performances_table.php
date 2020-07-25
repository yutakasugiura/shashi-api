<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')
                ->comment('企業id');
            $table->string('closing_year')
                ->comment('決算年');
            $table->string('sales')
                ->comment('売上高');
            $table->string('profit')
                ->comment('利益');
            $table->string('sales_type')
                ->comment('売上高名');
            $table->string('profit_type')
                ->comment('利益名');
            $table->string('sales_rgba')
                ->comment('売上カラー');
            $table->string('profit_rgba')
                ->comment('利益カラー');

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performances');
    }
}
