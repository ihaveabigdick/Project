<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_packages', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->string('name')
                ->comment('餐點名稱')
                ->collation('utf8_unicode_ci');
            $table->integer('price')
                ->comment('餐點價格');
            $table->integer('fileUploadId')->unsigned()
                ->comment('檔案id');
            $table->timestamps();

            $table->foreign('fileUploadId')
                ->references('id')
                ->on('file_uploads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_packages');
    }
}
