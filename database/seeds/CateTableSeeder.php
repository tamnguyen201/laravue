<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            ['categoryName'=>'Đào Tạo','categoryRank'=>0],
            ['categoryName'=>'Lập Trình','categoryRank'=>1],
        );
    }
}
