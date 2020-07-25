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
            $table->string('label')
                ->comment('決算区分');
            $table->string('closing_year')
                ->comment('決算年');
            $table->string('data')
                ->comment('決算数値');
            $table->string('background_color')
                ->comment('背景色');
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
