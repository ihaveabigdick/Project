<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\model\Sex;

class SexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sex = new Sex();
        $sex -> insert([
                ['name'=>"男性",'created_at' => Carbon::now(),'updated_at' => Carbon::now()],
                ['name'=>"女性",'created_at' => Carbon::now(),'updated_at' => Carbon::now()]
            ]
        );


    }


}
