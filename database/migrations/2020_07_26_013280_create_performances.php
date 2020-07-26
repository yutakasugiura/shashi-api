<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')
                ->comment('企業id');
            $table->string('label')
                ->comment('種別');
            $table->integer('FY1980');
            $table->integer('FY1981');
            $table->integer('FY1982');
            $table->integer('FY1983');
            $table->integer('FY1984');
            $table->integer('FY1985');
            $table->integer('FY1986');
            $table->integer('FY1987');
            $table->integer('FY1988');
            $table->integer('FY1989');
            $table->integer('FY1990');
            $table->integer('FY1991');
            $table->integer('FY1992');
            $table->integer('FY1993');
            $table->integer('FY1994');
            $table->integer('FY1995');
            $table->integer('FY1996');
            $table->integer('FY1997');
            $table->integer('FY1998');
            $table->integer('FY1999');
            $table->integer('FY2000');
            $table->integer('FY2001');
            $table->integer('FY2002');
            $table->integer('FY2003');
            $table->integer('FY2004');
            $table->integer('FY2005');
            $table->integer('FY2006');
            $table->integer('FY2007');
            $table->integer('FY2008');
            $table->integer('FY2009');
            $table->integer('FY2010');
            $table->integer('FY2011');
            $table->integer('FY2012');
            $table->integer('FY2013');
            $table->integer('FY2014');
            $table->integer('FY2015');
            $table->integer('FY2016');
            $table->integer('FY2017');
            $table->integer('FY2018');
            $table->integer('FY2019');
            $table->integer('FY2020');
            $table->integer('FY2021');
            $table->integer('FY2022');
            $table->integer('FY2023');
            $table->integer('FY2024');
            $table->integer('FY2025');
            $table->integer('FY2026');
            $table->integer('FY2027');
            $table->integer('FY2028');
            $table->integer('FY2029');
            $table->integer('FY2030');
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
        Schema::dropIfExists('performances');
    }
}
