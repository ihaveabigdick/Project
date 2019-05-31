<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuPackageInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_package_infos', function (Blueprint $table) {
            $table->increments('id')
                ->autoIncrement()
                ->comment('主鍵');
            $table->integer('packageId')->unsigned()
                ->comment('打包ＩＤ');
            $table->integer('menuId')->unsigned()
                ->comment('菜單ＩＤ');
            $table->timestamps();

            $table->foreign('packageId')
                ->references('id')
                ->on('menu_packages');
            $table->foreign('menuId')
                ->references('id')
                ->on('menus');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_package_infos');
    }
}
