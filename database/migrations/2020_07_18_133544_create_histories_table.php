<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id')
                ->comment('企業id');
            $table->unsignedBigInteger('history_tag_id')
                ->comment('種別id');
            $table->unsignedBigInteger('region_id')
                ->comment('地域');
            $table->string('year')
                ->comment('年');
            $table->string('summary')
                ->comment('見出し');
            $table->string('detail')
                ->comment('詳細');
            $table->timestamps();

            //企業削除時に消去（合併など）
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('history_tag_id')
                ->references('id')
                ->on('history_tags');

            $table->foreign('region_id')
                ->references('id')
                ->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
