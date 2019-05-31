<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_workers', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('restaurantId')->unsigned()
                ->comment("餐廳編號");
            $table->integer('userId')->unsigned()
                ->comment('使用者編號');
            $table->boolean('isDelete')
                ->default(0)
                ->comment('是否刪除');
            $table->timestamps();

            $table->foreign('restaurantId')
                ->references('id')
                ->on('restaurants');
            $table->foreign('userId')
                ->references('id')
                ->on('users');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_workers');
    }
}
