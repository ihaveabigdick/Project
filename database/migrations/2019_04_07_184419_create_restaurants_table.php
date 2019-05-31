<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->string('name',10)
                ->comment('餐廳名稱')
                ->collation('utf8_unicode_ci');
            $table->string('owner',10)
                ->comment('餐廳擁有者')
                ->collation('utf8_unicode_ci');
            $table->string('address',100)
                ->comment('餐廳地址')
                ->collation('utf8_unicode_ci');
            $table->string('phone',15)
                ->comment('餐廳電話')
                ->collation('utf8_unicode_ci');
            $table->string('msg',500)
                ->comment('餐廳介紹')
                ->collation('utf8_unicode_ci');
            $table->integer('fileUploadId')->unsigned()
                ->comment('檔案ＩＤ');
            $table->boolean('isDelete')
                ->default(0)
                ->comment('是否刪除');
            $table->timestamps();

            $table->foreign('fileUploadId')
                ->references('id')
                ->on('file_uploads')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
