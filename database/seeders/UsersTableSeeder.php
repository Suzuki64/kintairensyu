<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        'id'=>'1',
        'name'=>'山田太郎',
        'email'=>'yamadataro@aa.com',
        'password'=>'abc1'
        ]);
        DB::table('users')->insert([
        'id'=>'2',
        'name'=>'佐藤次郎',
        'email'=>'satojirou@aa.com',
        'password'=>'abc2'
        ]);
        DB::table('users')->insert([
        'id'=>'3',
        'name'=>'田中三郎',
        'email'=>'tanakasaburou@aa.com',
        'password'=>'abc3'
        ]);

    }
}
