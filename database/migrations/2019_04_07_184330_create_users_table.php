<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
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
            $table->integer('sex')
                ->comment('性別');
            $table->string('email',50)
                ->comment('電子信箱')
                ->collation('utf8_unicode_ci');
            $table->string('phone')
                ->comment('電話')
                ->collation('utf8_unicode_ci');
            $table->string('token',80)
                ->nullable()
                ->comment('權限')
                ->collation('utf8_unicode_ci');
            $table->boolean('isDelete')
                ->default(0)
                ->comment('是否刪除');
//            $table->integer('fileUploadId')->unsigned()
//                ->comment('檔案id');
            $table->timestamps();
//
//            $table->foreign('fileUploadId')
//                ->references('id')
//                ->on('file_uploads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
