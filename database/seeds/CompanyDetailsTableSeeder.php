<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //現段階はconfigから読み込む
        $registerData = config('seeder.company_detail');

        DB::table('company_details')->truncate();

        DB::table('company_details')->insert($registerData);
    }
}
