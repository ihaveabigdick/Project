<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_orders', function (Blueprint $table) {

            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('tid')
                ->comment('桌號');
            $table->string('name', 20)
                ->comment('名稱')
                ->collation('utf8_unicode_ci');
            $table->timestamp('created_at')
                ->default(now())
                ->collation('utf8_unicode_ci');
            $table->dateTime('finish_time')
                ->default(null)
                ->collation('utf8_unicode_ci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_orders');
    }
}
