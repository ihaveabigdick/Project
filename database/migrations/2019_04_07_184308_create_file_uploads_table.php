<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_uploads', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('uid')
                ->nullable()
                ->comment('使用者編號');
            $table->string('realName',100)
                ->comment('檔案名稱')
                ->collation("utf8_unicode_ci");
            $table->string('path',200)
                ->nullable()
                ->comment('檔案路徑')
                ->collation('utf8_unicode_ci');
            $table->string('uploadName',50)
                ->nullable()
                ->comment('上傳檔案名稱')
                ->collation('utf8_unicode_ci');
            $table->string('uploadType')
                ->nullable()
                ->comment('副檔名')
                ->collation('utf8_unicode_ci');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_uploads');
    }
}
