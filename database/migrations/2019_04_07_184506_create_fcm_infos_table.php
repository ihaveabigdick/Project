<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFcmInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcm_infos', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('fcmId')->unsigned()
                ->comment('推播ＩＤ');
            $table->string('msg',500)
                ->comment('推播信息')
                ->collation('utf8_unicode_ci');
            $table->boolean('isOpen')
                ->default(0)
                ->comment('是否接收');
            $table->timestamps();

            $table->foreign('fcmId')
                ->references('id')
                ->on('fcms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fcm_infos');
    }
}
