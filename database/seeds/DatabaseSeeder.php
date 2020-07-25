<?php

use App\Models\Company;
use App\Models\History;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 外部キー制約を一時的に無効にする
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        //NOTICE: 追加後は「composer dump-autoload」を実行
        //親テーブルを生成
        $this->call(CompaniesTableSeeder::class);
        $this->call(HistoryTagsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
    }
}
