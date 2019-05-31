<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_infos', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('orderId')->unsigned()
                ->comment('訂單編號');
            $table->integer('menuId')->unsigned()
                ->comment('菜單編號');
            $table->integer('count')
                ->comment('訂單數量');
            $table->timestamps();

            $table->foreign('orderId')
                ->references('id')
                ->on('orders');
            $table->foreign('menuId')
                ->references('id')
                ->on('menus');
        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_infos');
    }
}
