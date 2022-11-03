<?php

namespace Database\Seeders;

use App\Models\RestaurantCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RestaurantCategory::create(
            ['title'=>'ایرانی','english_title'=>'irani','main_id'=>0]
        );
        RestaurantCategory::create(
            ['title'=>'ایتالیایی','english_title'=>'italiayi','main_id'=>0]
        );
        RestaurantCategory::create(
            ['title'=>'سنتی','english_title'=>'sonati','main_id'=>0]
        );
    }
}
