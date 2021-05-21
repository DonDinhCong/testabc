<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Category::create([
                'cate_title' => 'Đồng Hồ Nam',
                'cate_image' => 'cate.jpg',
            ]);
        }
    }
}
