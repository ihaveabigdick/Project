<?php

use App\model\MenuGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;


class MenuGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menuGroups = new MenuGroup();

        $menuGroups->insert([
            ['type'=>'主餐類','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['type'=>'點心類','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['type'=>'熱烤類','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['type'=>'大便類dd','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
        ]);
    }
}
