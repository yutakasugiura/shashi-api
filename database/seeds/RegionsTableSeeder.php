<?php

use Illuminate\Database\Seeder;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registerData = config('region');

        DB::table('regions')->truncate();

        DB::table('regions')->insert($registerData);
    }
}
