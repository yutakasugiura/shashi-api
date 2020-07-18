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
            $table->unsignedBigInteger('type_id')
                ->comment('種別id');
            $table->integer('FY1980')
                ->nullable();
            $table->integer('FY1981')
                ->nullable();
            $table->integer('FY1982')
                ->nullable();
            $table->integer('FY1983')
                ->nullable();
            $table->integer('FY1984')
                ->nullable();
            $table->integer('FY1985')
                ->nullable();
            $table->integer('FY1986')
                ->nullable();
            $table->integer('FY1987')
                ->nullable();
            $table->integer('FY1988')
                ->nullable();
            $table->integer('FY1989')
                ->nullable();
            $table->integer('FY1990')
                ->nullable();
            $table->integer('FY1991')
                ->nullable();
            $table->integer('FY1992')
                ->nullable();
            $table->integer('FY1993')
                ->nullable();
            $table->integer('FY1994')
                ->nullable();
            $table->integer('FY1995')
                ->nullable();
            $table->integer('FY1996')
                ->nullable();
            $table->integer('FY1997')
                ->nullable();
            $table->integer('FY1998')
                ->nullable();
            $table->integer('FY1999')
                ->nullable();
            $table->integer('FY2001')
                ->nullable();
            $table->integer('FY2002')
                ->nullable();
            $table->integer('FY2003')
                ->nullable();
            $table->integer('FY2004')
                ->nullable();
            $table->integer('FY2005')
                ->nullable();
            $table->integer('FY2006')
                ->nullable();
            $table->integer('FY2007')
                ->nullable();
            $table->integer('FY2008')
                ->nullable();
            $table->integer('FY2009')
                ->nullable();
            $table->integer('FY2010')
                ->nullable();
            $table->integer('FY2011')
                ->nullable();
            $table->integer('FY2012')
                ->nullable();
            $table->integer('FY2013')
                ->nullable();
            $table->integer('FY2014')
                ->nullable();
            $table->integer('FY2015')
                ->nullable();
            $table->integer('FY2016')
                ->nullable();
            $table->integer('FY2017')
                ->nullable();
            $table->integer('FY2018')
                ->nullable();
            $table->integer('FY2019')
                ->nullable();
            $table->integer('FY2020')
                ->nullable();
            $table->integer('FY2021')
                ->nullable();
            $table->integer('FY2022')
                ->nullable();
            $table->integer('FY2023')
                ->nullable();
            $table->integer('FY2024')
                ->nullable();
            $table->integer('FY2025')
                ->nullable();
            $table->integer('FY2026')
                ->nullable();
            $table->integer('FY2027')
                ->nullable();
            $table->integer('FY2028')
                ->nullable();
            $table->integer('FY2029')
                ->nullable();
            $table->integer('FY2030')
                ->nullable();
            $table->string('memo')
                ->comment('備考');
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
        Schema::dropIfExists('performances');
    }
}
