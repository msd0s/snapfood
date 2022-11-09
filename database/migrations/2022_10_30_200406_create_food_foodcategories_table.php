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
        Schema::create('food_foodcategories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('foodcategory_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->timestamps();
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->foreign('foodcategory_id')->references('id')->on('foodcategories')->onDelete('cascade');
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_foodcategories');
    }
};
