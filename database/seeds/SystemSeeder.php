<?php

use App\model\System;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        $authSystemModel = new System();
        $authSystemModel->insert([
            ['name'=>"經理功能",'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
            ['name'=>"收銀員功能",'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
        ]);
    }
}
