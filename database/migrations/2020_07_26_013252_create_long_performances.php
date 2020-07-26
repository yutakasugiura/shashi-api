<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLongPerformances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('long_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')
                ->comment('企業id');
            $table->string('closing_year')
                ->comment('決算年');
            $table->string('sales')
                ->comment('売上推移');
            $table->string('profit')
                ->comment('利益推移');
            $table->string('sales_label')
                ->comment('売上高区分');
            $table->string('profit_label')
                ->comment('利益区分');
            $table->timestamps();

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
        Schema::dropIfExists('long_performances');
    }
}
