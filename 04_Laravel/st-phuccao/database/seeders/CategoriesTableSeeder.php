<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_id' => 'DC',
                'category_name' => 'Dụng cụ học tập',
            ],
            [
                'category_id' => 'DT',
                'category_name' => 'Điện tử',
            ],
            [
                'category_id' => 'MM',
                'category_name' => 'May mặc',
            ],
            [
                'category_id' => 'NT',
                'category_name' => 'Nội thất',
            ],
            [
                'category_id' => 'TP',
                'category_name' => 'Thực phẩm',
            ],
        ];

        foreach ($categories as $category) {
            $category['created_at'] = Carbon::now();
            $category['updated_at'] = Carbon::now();
            DB::table('categories')->insert($category);
        }
    }
}
