<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->string('tracking_code')->nullable(); //code rahgiri hamel(post,tipax,peyk,...)
            $table->string('order_code')->nullable(); //code peygiri sabt nahayi baraye namayesh be karbar
            $table->unsignedBigInteger('orderstatus_id')->default(1); //vasiat sefaresh be che shekli hast
            $table->string('status')->default(0); //sefaresh nahayi shode ya na
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('orderstatus_id')->references('id')->on('orderstatuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
