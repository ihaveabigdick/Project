<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderrs', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->string('mealName',10)
                ->comment('餐點名稱')
                ->collation('utf8_unicode_ci');
            $table->integer('mealPrice')
                ->comment('餐點價格');
            $table->integer('count')
                ->comment('餐點數量');
            $table->string('remark',50)
                ->nullable()
                ->collation('utf8_unicode_ci')
                ->comment('備註');
            $table->string('status',10)
                ->collation('utf8_unicode_ci')
                ->comment('出餐狀態');
            $table->integer('userId')->unsigned()
                ->comment('使用者ID');
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
        Schema::dropIfExists('orderrs');
    }
}
