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
        //TODO: 将来はjsonの読み込みに変更
        // $reader = new Reader;
        // $companyData = $reader->readJson('stock/company.json');

        //現段階はconfigから読み込む
        $companyData = config('company');

        //毎回DBをリフレッシュする
        DB::table('companies')->truncate();

        DB::table('companies')->insert($companyData);
    }
}
