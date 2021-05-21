<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Product::create([
                'product_code' => 'SKDN-3827' . $i,
                'brand_id' => 1,
                'product_title' => 'Đồng Hồ Audio',
                'product_avatar' => 'watch.jpg',
                'product_gender' => 1,
                'product_origin' => 'Nhật Bản',
                'product_color' => 'Hồng',
                'product_case' => 'Sắt Nguyên Chất',
                'product_size' => 42,
                'product_band' => 'Dây Da',
                'product_glass' => 'Sapphire',
                'product_des' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry typesetting industry.',
                'product_price' => 500,
            ]);
        }
    }
}
