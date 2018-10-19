<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CaffeineIntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('caffeine_intakes')->insert([
            'user_id'               => 1,
            'caffeine_source_id'    => rand(1,17),
            'units'                 => rand(1,5),
            'created_at'            => Carbon::now()
        ]);

        for ($i=0; $i < 10; $i++) {

            DB::table('caffeine_intakes')->insert([
                'user_id'               => 1,
                'caffeine_source_id'    => rand(1,17),
                'units'                 => rand(1,5),
                'created_at'            => Carbon::now()->today()
            ]);

            DB::table('caffeine_intakes')->insert([
                'user_id'               => 1,
                'caffeine_source_id'    => rand(1,17),
                'units'                 => rand(1,5),
                'created_at'            => Carbon::now()->subWeek()
            ]);

            DB::table('caffeine_intakes')->insert([
                'user_id'               => 1,
                'caffeine_source_id'    => rand(1,17),
                'units'                 => rand(1,5),
                'created_at'            => Carbon::now()->subYear()
            ]);

            DB::table('caffeine_intakes')->insert([
                'user_id'               => 1,
                'caffeine_source_id'    => rand(1,17),
                'units'                 => rand(1,5),
                'created_at'            => Carbon::now()->subYears(2)
            ]);

        }
    }
}
