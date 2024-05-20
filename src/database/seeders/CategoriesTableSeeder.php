<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = [
            'content' => '商品のお届けについて',
        ];
        DB::table('categories')->insert($category);

        $category = [
            'content' => '商品の交換について',
        ];
        DB::table('categories')->insert($category);

        $category = [
            'content' => '商品トラブル',
        ];
        DB::table('categories')->insert($category);

        $category = [
            'content' => 'ショップへのお問い合わせ',
        ];
        DB::table('categories')->insert($category);

        $category = [
            'content' => 'その他',
        ];
        DB::table('categories')->insert($category);

        

    }
}
