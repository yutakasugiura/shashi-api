<?php

use Illuminate\Database\Seeder;

class HistoryTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registerData = config('seeder.history_tag');

        DB::table('history_tags')->truncate();

        DB::table('history_tags')->insert($registerData);
    }
}
