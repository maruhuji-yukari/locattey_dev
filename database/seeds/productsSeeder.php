<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name'=>'18インチ型小型テレビ',
            'product_describe'=>'引っ越しに際し不要になりました。引き取り手を探しております。',
            'categories_id'=>'1',
            'users_id'=>'1',
            'trade_flag'=>'0',
            'product_image1'=>'noimage.jpg',
        ]);
    }
}
