<?php

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registerData = config('seeder.industry');

        DB::table('industries')->truncate();

        DB::table('industries')->insert($registerData);
    }
}
