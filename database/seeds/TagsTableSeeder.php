<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registerData = config('tag');

        DB::table('tags')->truncate();

        DB::table('tags')->insert($registerData);
    }
}
