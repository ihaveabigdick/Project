<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fcms', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('tid')
                ->nullable()
                ->comment('桌號');
            $table->integer('userId')->unsigned()
                ->nullable()
                ->comment('使用者ＩＤ');
            $table->string('fcmToken',  50)
                ->comment('推播金鑰')
                ->collation('utf8_unicode_ci');
            $table->string('status',20)
                ->nullable()
                ->comment('狀態')
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
        Schema::dropIfExists('fcms');
    }
}
