<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create(
            ['title'=>'در حال بررسی','bgcolor'=>'#F96D11','status'=>1]
        );
        OrderStatus::create(
            ['title'=>'در حال آماده سازی','bgcolor'=>'#0099FF','status'=>1]
        );
        OrderStatus::create(
            ['title'=>'ارسال به مقصد','bgcolor'=>'#00FF65','status'=>1]
        );
        OrderStatus::create(
            ['title'=>'تحویل گرفته شد','bgcolor'=>'#5500D8','status'=>1]
        );
    }
}
