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
            $table->integer('systemId')->unsigned()
                ->comment('系統權限ID');
            $table->string('account',20)
//                ->unique()
                ->comment('帳號')
                ->collation('utf8_unicode_ci');
            $table->string('password',20)
                ->comment('密碼')
                ->collation('utf8_unicode_ci');
            $table->string('name',15)
                ->comment('姓名')
                ->collation('utf8_unicode_ci');
            $table->string('sid',50)
                ->comment('身分證字號')
                ->collation('utf8_unicode_ci');
            $table->integer('sex')->unsigned()
                ->comment('性別');
            $table->string('email',50)
                ->comment('電子信箱')
                ->collation('utf8_unicode_ci');
            $table->string('phone')
                ->comment('電話')
                ->collation('utf8_unicode_ci');
            $table->boolean('isDelete')
                ->default(0)
                ->comment('是否刪除');
            $table->timestamps();

            $table->foreign('restaurantId')
                ->references('id')
                ->on('restaurants');
            $table->foreign('SystemId')
                ->references('id')
                ->on('systems');
            $table->foreign('sex')
                ->references('id')
                ->on('sexes');
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
