<?php

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
        $this->call(CompaniesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(RegionsTableSeeder::class);
        $this->call(HistoriesTableSeeder::class);
    }
}
