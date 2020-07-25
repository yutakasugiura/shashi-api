<?php

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Services\Reader\Reader;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateString();

        $companies = config('company');

        DB::table('companies')->truncate();

        DB::table('companies')->insert($companies);
    }
}
