<?php

use App\model\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $menu = new Menu();

        $menu -> insert([
        ['restaurantId'=>'1','menuType'=>'1','name'=>'海鮮拉幹你娘','price'=>'660','msg'=>'就是幹你娘海鮮','fileUploadId'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['restaurantId'=>'1','menuType'=>'1','name'=>'干貝拉幹你娘','price'=>'719','msg'=>'就是幹你娘干貝','fileUploadId'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['restaurantId'=>'1','menuType'=>'3','name'=>'烤雞拉幹你娘','price'=>'180','msg'=>'就是幹你烤雞','fileUploadId'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['restaurantId'=>'1','menuType'=>'2','name'=>'QQ拉幹你娘','price'=>'59','msg'=>'就是幹你娘QQ','fileUploadId'=>'1','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()]
        ]);

    }
}
