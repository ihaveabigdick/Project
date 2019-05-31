<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('restaurantId')->unsigned()
                ->comment('餐廳ＩＤ');
            $table->integer('menuType')->unsigned()
                ->comment('餐點類型');
            $table->string('name',20)
                ->comment('餐點名稱')
                ->collation('utf8_unicode_ci');
            $table->integer('price')
                ->comment('餐點價格');
            $table->string('msg')
                ->comment('餐點介紹')
                ->collation('utf8_unicode_ci');
            $table->integer('fileUploadId')->unsigned()
                ->comment('檔案ＩＤ');
            $table->boolean('isDelete')
                ->default(0)
                ->comment('是否刪除');
            $table->timestamps();

            $table->foreign('restaurantId')
                ->references('id')
                ->on('restaurants');
            $table->foreign('fileUploadId')
                ->references('id')
                ->on('file_uploads');
            $table->foreign('menuType')
                ->references('id')
                ->on('menu_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
