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
            $table->unsignedBigInteger('tag_id')
                ->comment('種別id');
            $table->unsignedBigInteger('region_id')
                ->comment('地域');
            //TODO: 後日追加
            // $table->unsignedBigInteger('key_person_id')
            //     ->comment('重要人物');
            $table->date('year')
                ->comment('年');
            $table->string('summary')
                ->comment('見出し');
            $table->string('detail')
                ->comment('詳細');
            $table->timestamps();

            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');

            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');

            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
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
        Schema::dropIfExists('histories');
    }
}
