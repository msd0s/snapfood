<?php

namespace Database\Seeders;

use App\Models\FoodCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FoodCategory::create(
            ['title'=>'پیتزا','english_title'=>'pizza','parent_id'=>0]
        );
        FoodCategory::create(
            ['title'=>'ساندویچ','english_title'=>'sandwitch','parent_id'=>0]
        );
        FoodCategory::create(
            ['title'=>'مرغ','english_title'=>'chicken','parent_id'=>0]
        );
        FoodCategory::create(
            ['title'=>'ماکارونی','english_title'=>'macaroni','parent_id'=>0]
        );
    }
}
