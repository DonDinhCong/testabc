<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            Brand::create([
                'brand_title' => 'Rolexxx',
                'brand_image' => 'rolex.png',
                'brand_des' => 'content',
            ]);
        }
    }
}
