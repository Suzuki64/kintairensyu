<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('records')->insert([
        'date'=>'2022-05-01',
        'attendance'=>'9:00',
        'leave'=>'17:00',
        'user_id'=>'2'
        ]);
        DB::table('records')->insert([
        'date'=>'2022-05-01',
        'attendance'=>'9:00',
        'leave'=>'18:00',
        'user_id'=>'1'
        ]);
        DB::table('records')->insert([
        'date'=>'2022-05-01',
        'attendance'=>'9:00',
        'leave'=>'17:00',
        'user_id'=>'3'
        ]);
    }
}
