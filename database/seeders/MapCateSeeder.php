<?php

namespace Database\Seeders;

use App\Models\MapCate;
use Illuminate\Database\Seeder;

class MapCateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 5; $i++){
            MapCate::create([
                'product_id' => 11,
                'cate_id' => $i,
            ]);
        }
    }
}
