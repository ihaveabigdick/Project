<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('userId')->unsigned()
                ->comment('使用者ＩＤ');
            $table->integer('total')
                ->comment('總價');
            $table->string('status',10)
                ->comment('訂單狀態')
                ->collation('utf8_unicode_ci');
            $table->string('remarks',100)
                ->comment('備註')
                ->collation('utf8_unicode_ci');
            $table->timestamps();

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
        Schema::dropIfExists('orders');
    }
}
