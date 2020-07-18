<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //現段階はconfigから読み込む
        $registerData = config('history');

        DB::table('histories')->truncate();

        DB::table('histories')->insert($registerData);
    }
}
