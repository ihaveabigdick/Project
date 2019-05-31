<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZenboUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zenbo_users', function (Blueprint $table) {
            $table->bigIncrements('id')
            ->autoIncrement()
            ->comment('ID');
            $table->string('account',20)
                ->comment('餐廳帳號')
                ->collation('utf8_unicode_ci');
            $table->string('passoword',20)
                ->comment('密碼')
                ->collation('utf8_unicode_ci');
            $table->integer('restaurantsId')->unsigned()
                ->comment('餐廳ＩＤ');
            $table->timestamps();


            $table->foreign('restaurantsId')
                ->references('id')
                ->on('restaurants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('zenbo_users');
    }
}
